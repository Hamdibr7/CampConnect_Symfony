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
use App\Entity\User;

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

        $type = $request->request->get('type_pub');
        $description = $request->request->get('description');

        if (!$description) {
            return new JsonResponse(['error' => 'Description is required for all posts'], Response::HTTP_BAD_REQUEST);
        }

        $publication = new Publication();
        $publication->setUtilisateurid($user);
        $publication->setDate(new \DateTime());
        $publication->setTypePub($type);
        $publication->setDescription($description);
        
        // Initialize contenu as empty string
        $publication->setContenu('');

        // Handle media upload for image/video posts
        if ($type !== 'text' && $mediaFile = $request->files->get('media')) {
            try {
                // Get the temporary path of the uploaded file
                $tempPath = $mediaFile->getRealPath();
                
                // Read the file contents
                $fileContents = file_get_contents($tempPath);
                
                // Upload to Cloudinary
                $result = $this->cloudinary->uploadApi()->upload(
                    $tempPath,
                    [
                        'resource_type' => $type === 'video' ? 'video' : 'image',
                        'public_id' => uniqid('post_'), // Generate a unique ID for the file
                    ]
                );
                
                // Set the Cloudinary URL as the content
                $publication->setContenu($result['secure_url']);
            } catch (\Exception $e) {
                return new JsonResponse(['error' => 'Failed to upload media: ' . $e->getMessage()], 500);
            }
        }

        try {
            $this->entityManager->persist($publication);
            $this->entityManager->flush();
            
            return new JsonResponse([
                'id' => $publication->getId(),
                'type_pub' => $publication->getTypePub(),
                'contenu' => $publication->getContenu(),
                'description' => $publication->getDescription(),
                'date' => $publication->getDate()->format('Y-m-d H:i:s'),
                'user' => [
                    'id' => $user->getId(),
                    'nom' => $user->getNom(),
                    'prenom' => $user->getPrenom(),
                    'pdp' => $user->getPdp()
                ],
                'likes' => [],
                'commentaires' => []
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Failed to create publication: ' . $e->getMessage()], 500);
        }
    }

    #[Route('/list', name: 'publication_list', methods: ['GET'])]
    public function list(PublicationRepository $publicationRepository): JsonResponse
    {
        // Using the repository method that orders by date DESC
        $publications = $publicationRepository->findByDateDesc();
        $data = [];

        // Map reaction type IDs to strings
        $reactionTypeMap = [
            1 => 'fire',
            2 => 'love',
            3 => 'laughing',
            4 => 'shocked',
            5 => 'sad',
            6 => 'angry'
        ];

        foreach ($publications as $publication) {
            $user = $publication->getUtilisateurid();
            $likes = $publication->getLikess()->map(function($like) use ($reactionTypeMap) {
                return [
                    'id' => $like->getId(),
                    'type' => $reactionTypeMap[$like->getReactionType()] ?? 'fire',
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
                'description' => $publication->getDescription(),
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
        // Use default user (ID: 8) for now until login is implemented
        $user = $this->utilisateurRepository->find(8);
        if (!$user) {
            return new JsonResponse(['error' => 'Default user not found'], Response::HTTP_UNAUTHORIZED);
        }

        $data = json_decode($request->getContent(), true);
        $reactionType = $data['type'] ?? null;

        if (!$reactionType || !in_array($reactionType, ['fire', 'love', 'laughing', 'shocked', 'sad', 'angry'])) {
            return new JsonResponse(['error' => 'Invalid reaction type'], Response::HTTP_BAD_REQUEST);
        }

        // Map reaction type string to ID
        $reactionTypeMap = [
            'fire' => 1,
            'love' => 2,
            'laughing' => 3,
            'shocked' => 4,
            'sad' => 5,
            'angry' => 6
        ];

        $existingLike = $this->entityManager->getRepository(Likes::class)->findOneBy([
            'publicationid' => $publication,
            'utilisateurid' => $user
        ]);

        $removed = false;

        if ($existingLike) {
            // If clicking the same reaction type, remove it
            if ($existingLike->getReactionType() === $reactionTypeMap[$reactionType]) {
                $this->entityManager->remove($existingLike);
                $removed = true;
            } else {
                // Update to new reaction type
                $existingLike->setReactionType($reactionTypeMap[$reactionType]);
                $this->entityManager->persist($existingLike);
            }
        } else {
            // Create new reaction
            $like = new Likes();
            $like->setPublicationid($publication);
            $like->setUtilisateurid($user);
            $like->setReactionType($reactionTypeMap[$reactionType]);
            $this->entityManager->persist($like);
        }

        $this->entityManager->flush();

        // Get updated likes
        $likes = $publication->getLikess()->map(function($like) use ($reactionTypeMap) {
            // Map reaction type ID back to string
            $typeString = array_search($like->getReactionType(), $reactionTypeMap) ?: 'fire';
            
            return [
                'id' => $like->getId(),
                'type' => $typeString,
                'user' => [
                    'id' => $like->getUtilisateurid()->getId(),
                    'nom' => $like->getUtilisateurid()->getNom(),
                    'prenom' => $like->getUtilisateurid()->getPrenom(),
                    'pdp' => $like->getUtilisateurid()->getPdp()
                ]
            ];
        })->toArray();

        return new JsonResponse([
            'success' => true,
            'removed' => $removed,
            'likes' => $likes,
            'hasReactions' => !empty($likes)
        ]);
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

    #[Route('/{id}/edit', name: 'publication_edit', methods: ['POST'])]
    public function edit(Request $request, Publication $publication): JsonResponse
    {
        try {
            // For now, using hardcoded user ID 8
            $user = $this->utilisateurRepository->find(8);
            
            if (!$user) {
                return new JsonResponse(['error' => 'User not found'], 404);
            }

            // Check if the current user is the owner of the post
            if ($publication->getUtilisateurid()->getId() !== $user->getId()) {
                return new JsonResponse(['error' => 'You are not authorized to edit this post'], 403);
            }

            // Get the description from form data
            $description = $request->request->get('description');
            if (!$description) {
                return new JsonResponse(['error' => 'Description is required'], 400);
            }

            $publication->setDescription($description);

            // Handle media updates for non-text posts
            if ($publication->getTypePub() !== 'text') {
                $mediaAction = $request->request->get('mediaAction');
                
                if ($mediaAction === 'remove') {
                    // Remove the media
                    $publication->setContenu('');
                } elseif ($mediaAction === 'change') {
                    // Handle new media upload
                    $mediaFile = $request->files->get('media');
                    if ($mediaFile) {
                        try {
                            // Get the temporary path of the uploaded file
                            $tempPath = $mediaFile->getRealPath();
                            
                            // Upload to Cloudinary
                            $result = $this->cloudinary->uploadApi()->upload(
                                $tempPath,
                                [
                                    'resource_type' => $publication->getTypePub() === 'video' ? 'video' : 'image',
                                    'public_id' => uniqid('post_'),
                                ]
                            );
                            
                            // Set the new Cloudinary URL
                            $publication->setContenu($result['secure_url']);
                        } catch (\Exception $e) {
                            return new JsonResponse(['error' => 'Failed to upload new media: ' . $e->getMessage()], 500);
                        }
                    }
                }
                // If mediaAction is 'keep', do nothing - keep the existing media
            }

            $this->entityManager->flush();

            return new JsonResponse([
                'success' => true,
                'message' => 'Post updated successfully',
                'post' => [
                    'id' => $publication->getId(),
                    'description' => $publication->getDescription(),
                    'contenu' => $publication->getContenu(),
                    'type_pub' => $publication->getTypePub(),
                    'date' => $publication->getDate()->format('Y-m-d H:i:s'),
                    'user' => [
                        'id' => $publication->getUtilisateurid()->getId(),
                        'prenom' => $publication->getUtilisateurid()->getPrenom(),
                        'nom' => $publication->getUtilisateurid()->getNom(),
                        'pdp' => $publication->getUtilisateurid()->getPdp()
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Error updating post: ' . $e->getMessage()], 500);
        }
    }

    #[Route('/{id}/delete', name: 'publication_delete', methods: ['POST'])]
    public function delete(Publication $publication): JsonResponse
    {
        try {
            // For now, using hardcoded user ID 8
            $user = $this->utilisateurRepository->find(8);
            
            if (!$user) {
                return new JsonResponse(['error' => 'User not found'], 404);
            }

            // Check if the current user is the owner of the post
            if ($publication->getUtilisateurid()->getId() !== $user->getId()) {
                return new JsonResponse(['error' => 'You are not authorized to delete this post'], 403);
            }

            // Delete associated media file if it exists
            if ($publication->getContenu() && $publication->getTypePub() !== 'text') {
                $mediaPath = $this->getParameter('media_directory') . '/' . basename($publication->getContenu());
                if (file_exists($mediaPath)) {
                    unlink($mediaPath);
                }
            }

            $this->entityManager->remove($publication);
            $this->entityManager->flush();

            return new JsonResponse([
                'success' => true,
                'message' => 'Post deleted successfully'
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Error deleting post: ' . $e->getMessage()], 500);
        }
    }

    #[Route('/{id}/comment/{commentId}/edit', name: 'publication_comment_edit', methods: ['POST'])]
    public function editComment(Request $request, Publication $publication, int $commentId): JsonResponse
    {
        try {
            // For now, using hardcoded user ID 8
            $user = $this->utilisateurRepository->find(8);
            
            if (!$user) {
                return new JsonResponse(['error' => 'User not found'], 404);
            }

            // Find the comment
            $comment = $this->entityManager->getRepository(Commentaire::class)->find($commentId);
            
            if (!$comment) {
                return new JsonResponse(['error' => 'Comment not found'], 404);
            }

            // Check if the comment belongs to the post
            if ($comment->getPublicationid()->getId() !== $publication->getId()) {
                return new JsonResponse(['error' => 'Comment does not belong to this post'], 400);
            }

            // Check if the current user is the owner of the comment
            if ($comment->getUtilisateurid()->getId() !== $user->getId()) {
                return new JsonResponse(['error' => 'You are not authorized to edit this comment'], 403);
            }

            $data = json_decode($request->getContent(), true);
            $content = $data['content'] ?? null;
            
            if (!$content) {
                return new JsonResponse(['error' => 'Content is required'], 400);
            }

            $comment->setContenu($content);
            $this->entityManager->flush();

            return new JsonResponse([
                'success' => true,
                'message' => 'Comment updated successfully'
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Error updating comment: ' . $e->getMessage()], 500);
        }
    }

    #[Route('/{id}/comment/{commentId}/delete', name: 'publication_comment_delete', methods: ['POST'])]
    public function deleteComment(Publication $publication, int $commentId): JsonResponse
    {
        try {
            // For now, using hardcoded user ID 8
            $user = $this->utilisateurRepository->find(8);
            
            if (!$user) {
                return new JsonResponse(['error' => 'User not found'], 404);
            }

            // Find the comment
            $comment = $this->entityManager->getRepository(Commentaire::class)->find($commentId);
            
            if (!$comment) {
                return new JsonResponse(['error' => 'Comment not found'], 404);
            }

            // Check if the comment belongs to the post
            if ($comment->getPublicationid()->getId() !== $publication->getId()) {
                return new JsonResponse(['error' => 'Comment does not belong to this post'], 400);
            }

            // Check if the current user is the owner of the comment
            if ($comment->getUtilisateurid()->getId() !== $user->getId()) {
                return new JsonResponse(['error' => 'You are not authorized to delete this comment'], 403);
            }

            $this->entityManager->remove($comment);
            $this->entityManager->flush();

            return new JsonResponse([
                'success' => true,
                'message' => 'Comment deleted successfully'
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Error deleting comment: ' . $e->getMessage()], 500);
        }
    }
}
