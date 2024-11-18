<?php 

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\Raca;
use App\Form\AnimalFormType;
use App\Repository\AnimalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AnimalController extends AbstractController{
    
    
    #[Route('/animal', name:'app_animal')]
    public function index(AnimalRepository $animalRepository, Request $request, EntityManagerInterface $em) : Response
    {
        $msg = "";
        $animal = new Animal();
        $form = $this->createForm(AnimalFormType::class, $animal, ['method' => 'GET']);
        $form->handleRequest($request);

        try{
            if ($form->isSubmitted() && $form->isValid()){
                $raca = $form->get('raca')->getData();
                if ($raca instanceof Raca) {
                    $animal->setRaca($raca);
                }
                

                $em->persist($animal);
                $em->flush();
                $msg = 'Animal cadastrado com sucesso !';
            }
        }catch(Exception $e){
            $msg = 'Erro ao cadastrar animal';
        }

        $this->denyAccessUnlessGranted("ROLE_USER");
        $data['animais'] = $animalRepository->findAll();        
        $data['titulo'] = 'Lista de Animais';
        $data['animalForm'] = $form;
        $data['msg'] = $msg;

        return $this->render('animal/index.html.twig', $data);

    }
}

?>