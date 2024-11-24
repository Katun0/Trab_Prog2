<?php 

namespace App\Controller;

use App\Entity\Veterinario;
use App\Form\VeterinarioFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VeterinarioController extends AbstractController
{   
    #[Route('cadastro/veterinario', name:'app_cadastroVeterinario')]
    public function index(Request $request, EntityManagerInterface $em) : Response
    {
        $this->denyAccessUnlessGranted("ROLE_USER");
        $msg = '';
        $veterinario = new Veterinario();
        $form = $this->createForm(VeterinarioFormType::class, $veterinario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em->persist($veterinario);
            $em->flush();
        }

        $data['titulo'] = 'Cadastro de Veterinário';
        $data['form'] = $form;

        return $this->render('cadastro/veterinario.html.twig', $data);
    }
}


?>