<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Entity\Likes;
use App\Entity\Commentaire;
use App\Repository\PublicationRepository;
use App\Repository\LikesRepository;
use App\Repository\CommentaireRepository;
use App\Repository\UtilisateurRepository;
use App\Service\CloudinaryService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Cloudinary\Cloudinary;

#[Route('/publication')]
class PublicationController extends AbstractController
{
    private $entityManager;
    private $security;
    private $utilisateurRepository;
    private $cloudinary;

    public function __construct(
        EntityManagerInterface $entityManager, 
        Security $security, 
        UtilisateurRepository $utilisateurRepository,
        Cloudinary $cloudinary
    ) {
        $this->entityManager = $entityManager;
        $this->security = $security;
        $this->utilisateurRepository = $utilisateurRepository;
        $this->cloudinary = $cloudinary;
    }

    #[Route('/new', name: 'app_publication_new', methods: ['POST'])]
    public function new(Request $request): JsonResponse
    {
        // Use default user (ID: 8) for now
        $user = $this->utilisateurRepository->find(8);
        if (!$user) {
            return new JsonResponse(['error' => 'Default user not found'], Response::HTTP_UNAUTHORIZED);
        }

        $content = $request->request->get('content');
        $type = $request->request->get('type_pub');
        $mediaFile = $request->files->get('media');

        $publication = new Publication();
        $publication->setUtilisateurid($user);
        $publication->setDate(new \DateTime());
        $publication->setTypePub($type);
        $publication->setContenu($content);

        if ($mediaFile) {
            try {
                $result = $this->cloudinary->uploadApi()->upload(
                    $mediaFile->getRealPath(),
                    ['resource_type' => $type === 'video' ? 'video' : 'image']
                );
                $publication->setContenu($result['secure_url']);
            } catch (\Exception $e) {
                return new JsonResponse(['error' => 'Failed to upload media: ' . $e->getMessage()], 500);
            }
        }

        try {
            $this->entityManager->persist($publication);
            $this->entityManager->flush();
            return new JsonResponse(['message' => 'Publication created successfully', 'id' => $publication->getId()]);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Failed to create publication: ' . $e->getMessage()], 500);
        }
    }

    #[Route('/list', name: 'publication_list', methods: ['GET'])]
    public function list(PublicationRepository $publicationRepository): JsonResponse
    {
        $publications = $publicationRepository->findByDateDesc();
        $data = [];

        foreach ($publications as $publication) {
            $user = $publication->getUtilisateurid();
            $likes = $publication->getLikess()->map(function($like) {
                return [
                    'id' => $like->getId(),
                    'user' => [
                        'id' => $like->getUtilisateurid()->getId(),
                        'nom' => $like->getUtilisateurid()->getNom(),
                        'prenom' => $like->getUtilisateurid()->getPrenom(),
                        'pdp' => $like->getUtilisateurid()->getPdp()
                    ]
                ];
            })->toArray();
            
            $commentaires = $publication->getCommentaires()->map(function($comment) {
                $commentUser = $comment->getUtilisateurid();
                return [
                    'id' => $comment->getId(),
                    'contenu' => $comment->getContenu(),
                    'date' => $comment->getDate()->format('Y-m-d H:i:s'),
                    'user' => [
                        'id' => $commentUser->getId(),
                        'nom' => $commentUser->getNom(),
                        'prenom' => $commentUser->getPrenom(),
                        'pdp' => $commentUser->getPdp()
                    ]
                ];
            })->toArray();

            $data[] = [
                'id' => $publication->getId(),
                'contenu' => $publication->getContenu(),
                'type_pub' => $publication->getTypePub(),
                'date' => $publication->getDate()->format('Y-m-d H:i:s'),
                'likes' => $likes,
                'commentaires' => $commentaires,
                'user' => [
                    'id' => $user->getId(),
                    'nom' => $user->getNom(),
                    'prenom' => $user->getPrenom(),
                    'pdp' => $user->getPdp()
                ]
            ];
        }

        return new JsonResponse($data);
    }

    #[Route('/{id}/reaction', name: 'publication_reaction', methods: ['POST'])]
    public function reaction(Request $request, Publication $publication): JsonResponse
    {
        // Use default user (ID: 8) for now
        $user = $this->utilisateurRepository->find(8);
        if (!$user) {
            return new JsonResponse(['error' => 'Default user not found'], Response::HTTP_UNAUTHORIZED);
        }

        $data = json_decode($request->getContent(), true);
        $reactionType = $data['reaction'] ?? null;

        if (!$reactionType) {
            return new JsonResponse(['error' => 'Reaction type is required'], Response::HTTP_BAD_REQUEST);
        }

        $existingLike = $this->entityManager->getRepository(Likes::class)->findOneBy([
            'publicationid' => $publication,
            'utilisateurid' => $user
        ]);

        if ($existingLike) {
            if ($existingLike->getType() === $reactionType) {
                $this->entityManager->remove($existingLike);
            } else {
                $existingLike->setType($reactionType);
            }
        } else {
            $like = new Likes();
            $like->setPublicationid($publication);
            $like->setUtilisateurid($user);
            $like->setType($reactionType);
            $this->entityManager->persist($like);
        }

        $this->entityManager->flush();

        $likes = $publication->getLikess()->map(function($like) {
            return [
                'id' => $like->getId(),
                'type' => $like->getType(),
                'user' => [
                    'id' => $like->getUtilisateurid()->getId(),
                    'nom' => $like->getUtilisateurid()->getNom(),
                    'prenom' => $like->getUtilisateurid()->getPrenom(),
                    'pdp' => $like->getUtilisateurid()->getPdp()
                ]
            ];
        })->toArray();

        return new JsonResponse(['likes' => $likes]);
    }

    #[Route('/{id}/comment', name: 'publication_comment', methods: ['POST'])]
    public function comment(Request $request, Publication $publication): JsonResponse
    {
        // Use default user (ID: 8) for now
        $user = $this->utilisateurRepository->find(8);
        if (!$user) {
            return new JsonResponse(['error' => 'Default user not found'], Response::HTTP_UNAUTHORIZED);
        }

        $data = json_decode($request->getContent(), true);
        $content = $data['content'] ?? null;
        
        if (!$content) {
            return new JsonResponse(['error' => 'Content is required'], Response::HTTP_BAD_REQUEST);
        }

        $comment = new Commentaire();
        $comment->setPublicationid($publication);
        $comment->setUtilisateurid($user);
        $comment->setContenu($content);
        // Date is set in constructor

        try {
            $this->entityManager->persist($comment);
            $this->entityManager->flush();

            return new JsonResponse([
                'success' => true,
                'comment' => [
                    'id' => $comment->getId(),
                    'contenu' => $comment->getContenu(),
                    'date' => $comment->getDate()->format('Y-m-d H:i:s'),
                    'user' => [
                        'id' => $user->getId(),
                        'nom' => $user->getNom(),
                        'prenom' => $user->getPrenom(),
                        'pdp' => $user->getPdp()
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Failed to save comment'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
