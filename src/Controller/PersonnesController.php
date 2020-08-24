<?php

namespace App\Controller;

use App\Entity\Personnes;
use App\Form\PersonnesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PersonnesController extends AbstractController
{
    /**
     * @Route("/personnes/{id}", name="personnes")
     */
    public function index(Personnes $personnes)
    {
        return $this->render('personnes/index.html.twig', [
            'personne' => $personnes ,
        ]);
    }
    /**
     * @Route("/add", name="add_personne")
     * @Route("/personnes/{id}/edit", name="edit_personne")
     */
    public function add(Personnes $personne=null,Request $request)
    {
        if(!$personne){
            $personne=new Personnes();
        }
        $formulaire=$this->createForm(PersonnesType::class,$personne);
        $formulaire->handleRequest($request);
        if($formulaire->isSubmitted() && $formulaire->isValid()){
            $brochureFile = $formulaire ['cvpdf']->getData();
            $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = 'fichier-'.uniqid().'.'.$brochureFile->guessExtension();
            try {
                $brochureFile->move(
                    $this->getParameter('logo_directory'),
                    $newFilename
                );
            } catch (FileException $e) {

            }
            #####################
            $brochureFile = $formulaire ['portrait']->getData();
            $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newportrait = 'fichier-'.uniqid().'.'.$brochureFile->guessExtension();
            try {
                $brochureFile->move(
                    $this->getParameter('logo_directory'),
                    $newportrait
                );
            } catch (FileException $e) {

            }
            $personne=$formulaire->getData();
            $personne->setCvpdf($newFilename);
            $personne->setPortrait($newportrait);
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($personne);
            $entityManager->flush();
            unset($entityManager);
            unset($personne);
            return $this->redirectToRoute('listes_personne');
        }
        return $this->render('personnes/add.html.twig', [
            'formulaire' => $formulaire->createView()
        ]);
    }
}
