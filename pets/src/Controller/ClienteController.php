<?php 

namespace App\Controller;

use App\Entity\Cliente;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ClienteForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;

class ClienteController extends AbstractController{

    #[Route('/cadastro/cliente', name:'app_cadastroCliente')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $cliente = new Cliente();
        $form = $this->createForm(ClienteForm::class, $cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($cliente);
            $em->flush();
        }
        $this->denyAccessUnlessGranted("ROLE_USER");
        $data['titulo'] = 'Cadastro de Clientes';
        $data['clienteForm'] = $form;

        return $this->render('cadastro/cliente.html.twig',
        $data   
    );

    }

}   


?>