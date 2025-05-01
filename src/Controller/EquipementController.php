<?php

namespace App\Controller;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Equipement;
use App\Form\EquipementType;
use App\Repository\EquipementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


#[Route('/equipement')]
class EquipementController extends AbstractController
{
    

    #[Route('/admin/new', name: 'app_equipement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $equipement = new Equipement();
        $form = $this->createForm(EquipementType::class, $equipement);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('imageFile')->getData();
            
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();
    
                try {
                    $imageFile->move(
                        $this->getParameter('equipement_images_directory'),
                        $newFilename
                    );
                    $equipement->setImage($newFilename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur lors du téléchargement de l\'image');
                }
            }
    
            $entityManager->persist($equipement);
            $entityManager->flush();
    
            $this->addFlash('success', 'Équipement créé avec succès!');
            return $this->redirectToRoute('app_equipement_index');
        }
    
        return $this->render('equipement/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    // Edit equipment
    #[Route('/admin/{id}/edit', name: 'app_equipement_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        Equipement $equipement,
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger
    ): Response {
        $form = $this->createForm(EquipementType::class, $equipement);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('imageFile')->getData();
            
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();
    
                try {
                    // Delete old image if exists
                    if ($equipement->getImage()) {
                        $oldImagePath = $this->getParameter('equipement_images_directory').'/'.$equipement->getImage();
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }
    
                    // Move new file
                    $imageFile->move(
                        $this->getParameter('equipement_images_directory'),
                        $newFilename
                    );
                    
                    // Update entity with new filename
                    $equipement->setImage($newFilename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur lors du remplacement de l\'image : '.$e->getMessage());
                    return $this->redirectToRoute('app_equipement_edit', ['id' => $equipement->getId()]);
                }
            }
    
            try {
                $entityManager->flush();
                $this->addFlash('success', 'Équipement mis à jour avec succès !');
                return $this->redirectToRoute('app_equipement_index');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de la mise à jour : '.$e->getMessage());
            }
        }
    
        return $this->render('equipement/edit.html.twig', [
            'equipement' => $equipement,
            'form' => $form->createView(),
        ]);
    }

    // Delete equipment
    #[Route('/admin/{id}', name: 'app_equipement_delete', methods: ['POST'])]
    public function delete(
        Request $request,
        Equipement $equipement,
        EntityManagerInterface $entityManager
    ): Response {
   
        if ($this->isCsrfTokenValid('delete'.$equipement->getId(), $request->request->get('_token'))) {
            try {
                
                if ($equipement->getImage()) {
                    $imagePath = $this->getParameter('equipement_images_directory').'/'.$equipement->getImage();
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
    
                $entityManager->remove($equipement);
                $entityManager->flush();
    
                $this->addFlash('success', 'L\'équipement a été supprimé avec succès !');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de la suppression : '.$e->getMessage());
            }
        } else {
            $this->addFlash('error', 'Token CSRF invalide, suppression annulée.');
        }
    
        return $this->redirectToRoute('app_equipement_index');
    }

#[Route('/liste', name: 'app_equipement_index', methods: ['GET'])]
public function index(
    EquipementRepository $equipementRepository,
    PaginatorInterface $paginator,
    Request $request
): Response {
    
    $query = $equipementRepository->createQueryBuilder('e')
        ->orderBy('e.nomEquip', 'ASC')
        ->getQuery();

    $equipements = $paginator->paginate(
        $query,
        $request->query->getInt('page', 1), 
        4 
    );

    
    if (count($equipements) === 0) {
        $this->addFlash('warning', 'Aucun équipement trouvé dans la base de données !');
    }

   
    return $this->render('equipement/show.html.twig', [
        'equipements' => $equipements,
    ]);
}


   ////////////partie front//////////////////


#[Route('/shop', name: 'app_shop_index', methods: ['GET'])]
public function listerLesEquipementsPourUser(Request $request, EquipementRepository $equipementRepository, PaginatorInterface $paginator): Response
{
    $searchTerm = $request->query->get('q');
    $isAjax = $request->query->get('ajax');
         
    $queryBuilder = $equipementRepository->createQueryBuilder('e');
    if ($searchTerm) {
        $queryBuilder->where('e.nomEquip LIKE :term')
                    ->setParameter('term', '%' . $searchTerm . '%');
    }
         
    $pagination = $paginator->paginate(
        $queryBuilder->getQuery(),
        $request->query->getInt('page', 1),
        6 // items per page
    );
    
    // Si c'est une requête AJAX, renvoyer seulement le HTML des résultats
    if ($isAjax) {
        $html = $this->renderView('frontequipement/_equipements_list.html.twig', [
            'equipements' => $pagination,
            'searchTerm' => $searchTerm,
        ]);
        
        return $this->json([
            'html' => $html
        ]);
    }
         
    // Sinon, renvoyer la page complète
    return $this->render('frontequipement/shop.html.twig', [
        'equipements' => $pagination,
        'searchTerm' => $searchTerm,
    ]);
}

  
    /*#[Route('/shop', name: 'app_shop_index', methods: ['GET'])]
    public function listerLesEquipementsPourUser(Request $request, EquipementRepository $equipementRepository, PaginatorInterface $paginator): Response
    {
        $searchTerm = $request->query->get('q');
        
        $queryBuilder = $equipementRepository->createQueryBuilder('e');
        if ($searchTerm) {
            $queryBuilder->where('e.nomEquip LIKE :term OR e.description LIKE :term')
                         ->setParameter('term', '%' . $searchTerm . '%');
        }
    
        $pagination = $paginator->paginate(
            $queryBuilder->getQuery(),
            $request->query->getInt('page', 1),
            6 // items per page
        );
    
        return $this->render('frontequipement/shop.html.twig', [
            'equipements' => $pagination,
            'searchTerm' => $searchTerm,
        ]);
    }*/
    






#[Route('/shop/search', name: 'app_shop_search', methods: ['GET'])]
public function search(Request $request, EquipementRepository $repo): Response
{
    $term = $request->query->get('q', '');
    $equipements = $repo->createQueryBuilder('e')
        ->where('e.nomEquip LIKE :term OR e.description LIKE :term')
        ->setParameter('term', '%' . $term . '%')
        ->orderBy('e.nomEquip', 'ASC')
        ->getQuery()
        ->getResult();

    return $this->render('frontequipement/_equipement_cards.html.twig', [
        'equipements' => $equipements,
    ]);
}


}
   
