<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ClienteForm;
use Symfony\Component\Form\FormTypeInterface;


class ClienteController extends AbstractController{

    #[Route('/cadastro/cliente', name:'app_cadastroCliente')]
    public function index(): Response
    {
        $form = $this->createForm(ClienteForm::class);
        $data['titulo'] = 'Cadastro de Clientes';
        $data['clienteForm'] = $form;

        return $this->render('cadastro/cliente.html.twig',
        $data
    );

    }

}   


?>