<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;


class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(UserRepository $userRepository, Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $userPasswordHasher) : Response
    {
        $msg = "";
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user, ['method' => 'GET']);
        $form->handleRequest($request);

        try{
            if ($form->isSubmitted() && $form->isValid()){
                if ($form->isSubmitted() && $form->isValid()) {
                    /** @var string $plainPassword */
                    $plainPassword = $form->get('plainPassword')->getData();
        
                    // encode the plain password
                    $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));
        
                    $user->setRoles(["ROLE_USER"]);
                }

                $em->persist($user);
                $em->flush();
                $msg = 'Usuário cadastrado com sucesso !';
            }
        }catch(Exception $e){
            $msg = 'Erro ao cadastrar Usuário';
        }

        $this->denyAccessUnlessGranted("ROLE_USER");
        $data['usuarios'] = $userRepository->findAll();        
        $data['titulo'] = 'Lista de Usuários';
        $data['userForm'] = $form;
        $data['msg'] = $msg;

        
        return $this->render('user/index.html.twig', $data);
    }
}

