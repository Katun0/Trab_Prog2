<?php 

namespace App\Controller;

use App\Form\AnimalFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController{
    
    #[Route('cadastro/animal', name:'app_cadastroAnimal')]
    public function index() : Response
    {
        $form = $this->createForm(AnimalFormType::class);
        $data['titulo'] = 'Cadastro de Animal';
        $data['form'] = $form;

        return $this->render('cadastro/animal.html.twig', $data);
    }
}

?>