<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name:'app_home')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted("ROLE_USER");

            // Simulando dados de exemplo
            $animal = [
                'nome' => 'Millo',
                'especie' => 'Cão',
                'raca' => 'Pug Gordo',
                'cor' => 'Branco',
                'idade' => '2 Anos',
                'peso' => 'Muitos',
                'castrado' => false,
            ];
    
            $tutor = [
                'nome' => 'João S.',
                'idade' => 21,
                'cpf' => '074.163.119.93',
                'contato' => '(49) 9 9953-9716',
                'endereco' => [
                    'logradouro' => 'Rua 10 de setembro, 2050',
                    'cep' => '89566-266',
                ],
            ];
        return $this->render('home/home.html.twig', [
            'animal' => $animal,
            'tutor' => $tutor,]);
    }
}