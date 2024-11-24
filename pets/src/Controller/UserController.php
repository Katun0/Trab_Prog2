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

        try {
            if ($form->isSubmitted() && $form->isValid()) {
                /** @var string $plainPassword */
                $plainPassword = $form->get('plainPassword')->getData();

                // Encode the plain password
                $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));

                // Persistir User
                $em->persist($user);

                // Verificar o tipo do usuário baseado nos roles
                if (in_array('ROLE_TUTOR', $user->getRoles())) {
                    $tutor = new Tutor();
                    $tutor->setUser($user);
                    

                    $em->persist($tutor);
                }

                if (in_array('ROLE_VETERINARIO', $user->getRoles())) {
                    $veterinario = new Veterinario();
                    $veterinario->setUser($user);
                    
                    // Campos dinâmicos do Veterinario (vindo do request)
                    $veterinario->setCrmv($request->get('vet')['crmv'] ?? null);

                    $em->persist($veterinario);
                }

                // Salvar todas as entidades
                $em->flush();

                $msg = 'Usuário cadastrado com sucesso!';
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
