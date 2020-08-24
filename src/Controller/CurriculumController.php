<?php

namespace App\Controller;

use App\Entity\Personnes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CurriculumController extends AbstractController
{
    /**
     * @Route("/", name="listes_personne")
     */
    public function index()
    {
        $repo=$this->getDoctrine()->getRepository(Personnes::class);
        $personnel=$repo->findPersonne();
        return $this->render('curriculum/index.html.twig', [
            'employee' => $personnel,
        ]);
    }
}
