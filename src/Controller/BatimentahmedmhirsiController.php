<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Batiment;
use App\Form\BatimentahmedType;
use App\Repository\BatimentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

final class BatimentahmedmhirsiController extends AbstractController
{
    #[Route('/batimentahmedmhirsi', name: 'app_batimentahmedmhirsi')]
    public function index(): Response
    {
        return $this->render('batimentahmedmhirsi/index.html.twig', [
            'controller_name' => 'BatimentahmedmhirsiController',
        ]);
    }

    #[Route('/batiment/list', name: 'app_batiment_list')]
    public function list(BatimentRepository $batimentRepository): Response
    {   
        $batimentsDB = $batimentRepository->findAll();
        return $this->render('batimentahmedmhirsi/list.html.twig', [
            'batiments' => $batimentsDB,
        ]);
    }

    #[Route('/batiment/details/{id}', name: 'app_batiment_details')]
    public function details($id, BatimentRepository $batimentRepository): Response{
        
        $batiment = $batimentRepository->find($id);
        return $this->render('batimentahmedmhirsi/details.html.twig', [
            "batiment" => $batiment,
            "title" => "Batiment Details",
        ]);
    }
    #[Route('/batiment/create', name:'app_batiment_create')]
    public function createBatiment(Request $request, EntityManagerInterface $em){
        $batiment = new Batiment();
        //$batiment->setEmail('test@gmail.commmm');
        $form= $this->createForm(BatimentahmedType::class, $batiment);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em->persist($batiment);
            $em->flush();
            return $this->redirectToRoute('app_batiment_list');
        }
        return $this->render('batimentahmedmhirsi/form.html.twig', [
            "title" => "Create Batiment",
            "form" => $form
        ]);
    }

    #[Route('/batiment/update/{id}', name:'app_batiment_update')]
    public function updateBatiment($id, Request $request, BatimentRepository $batimentRepository, EntityManagerInterface $em){
        $batiment = $batimentRepository->find($id);
        //$batiment->setEmail('test@gmail.commmm');
        $form= $this->createForm(BatimentahmedType::class, $batiment);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            //$em->persist($batiment);
            $em->flush();
            return $this->redirectToRoute('app_batiment_list');
        }
        return $this->render('batimentahmedmhirsi/form.html.twig', [
            "title" => "Update Batiment",
            "form" => $form
        ]);
    }

    #[Route('/batiment/delete/{id}', name:'app_batiment_delete')]
    public function deleteBatiment($id, EntityManagerInterface $em, BatimentRepository $batimentRepository){
        $batiment = $batimentRepository->find($id);
        $em->remove($batiment);
        $em->flush();
        return $this->redirectToRoute('app_batiment_list');
        //dd("Batiment Deleted");
    }
}
