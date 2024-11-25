<?php

namespace App\Controller;

use App\Entity\Tutor;
use App\Entity\User;
use App\Entity\Veterinario;
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
    public function index(
        UserRepository $userRepository, 
        Request $request, 
        EntityManagerInterface $em, 
        UserPasswordHasherInterface $userPasswordHasher
    ): Response {
        $msg = "";

        // Criar uma nova instância de User
        $user = new User();
        
        // Criar o formulário principal para User
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        $userType = $form->get('type')->getData();

        try {
            if ($form->isSubmitted() && $form->isValid()) {
                // Verificar o tipo do usuário baseado nos roles
                if ($userType === 'tutor') {
                    $user = new Tutor();
                    $user->setNome($form->get('nome')->getData());
                    $user->setEmail($form->get('email')->getData());
                    $user->setPassword(
                    $userPasswordHasher->hashPassword(
                        $user,
                        $form->get('plainPassword')->getData()
                        )
                    );
                    $user->setRoles(['ROLE_TUTOR']);

                } elseif ($userType === 'veterinario') {
                    $user = new Veterinario();
                    $user->setNome($form->get('nome')->getData());
                    $user->setEmail($form->get('email')->getData());
                    $user->setPassword(
                    $userPasswordHasher->hashPassword(
                        $user,
                        $form->get('plainPassword')->getData()
                        )
                    );
                    $user->setRoles(['ROLE_VETERINARIO']);

                    $em->persist($user);
                    $em->flush();
                } else {
                    throw new Exception('Tipo de usuário inválido.');
                }
            }
        } catch (Exception $e) {
            $msg = 'Erro ao cadastrar Usuário: ' . $e->getMessage();
}

$this->denyAccessUnlessGranted("ROLE_USER");
$data['usuarios'] = $userRepository->findAll();
$data['titulo'] = 'Lista de Usuários';
$data['form'] = $form;
$data['msg'] = $msg;


return $this->render('user/index.html.twig', $data);
}
}