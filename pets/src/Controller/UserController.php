<?php

namespace App\Controller;

use App\Entity\Tutor;
use App\Entity\User;
use App\Entity\Veterinario;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
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

<<<<<<< HEAD
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
=======
                $userType = $form->get('userType')->getData();
                
                // Cria a entidade correta com base no tipo selecionado
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
                } else {
                    throw new Exception('Tipo de usuário inválido.');
                }
        
        
                // Persistir e salvar no banco
                $em->persist($user);
                $em->flush();
                dump('usuário Salvo');
        
                $msg = 'Usuário cadastrado com sucesso!';
            }
        } catch (Exception $e) {
            return new Response('Erro ao criar usuário: ' . $e->getMessage());
>>>>>>> 2d58c410fbb1caf7b679b3b0396c1aa5a5047edc
        }

        $this->denyAccessUnlessGranted("ROLE_USER");
        $data['usuarios'] = $userRepository->findAll();
        $data['titulo'] = 'Lista de Usuários';
        $data['form'] = $form;
        $data['msg'] = $msg;
<<<<<<< HEAD
=======
        
>>>>>>> 2d58c410fbb1caf7b679b3b0396c1aa5a5047edc

        return $this->render('user/index.html.twig', $data);
    }

    #[Route('/test-user', name: 'test_user')]
public function testUser(EntityManagerInterface $em): Response
{
    try {
        $tutor = new Tutor();
        $tutor->setNome('José');
        $tutor->setEmail('test@example.com');
        $tutor->setPassword('hashedPassword'); // Pode ser o hash de teste
        $tutor->setRoles(['ROLE_TUTOR']);

        $em->persist($tutor);
        $em->flush();

        return new Response('Usuário tutor criado com sucesso.');
    } catch (\Exception $e) {
        return new Response('Erro ao criar usuário: ' . $e->getMessage());
    }
}
<<<<<<< HEAD
=======

}
>>>>>>> 2d58c410fbb1caf7b679b3b0396c1aa5a5047edc
