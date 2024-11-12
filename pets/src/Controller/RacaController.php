<?php

namespace App\Controller;

use App\Entity\Raca;
use App\Form\RacaFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RacaController extends AbstractController
{
    #[Route('/raca', name: 'app_raca')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $raca = new Raca();
        $form = $this->createForm(RacaFormType::class, $raca);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($raca);
            $em->flush();
        }

        $data['titulo'] = 'Cadastro de Raça';
        $data['form'] = $form;

        return $this->render('raca/index.html.twig', $data);
    }
}
