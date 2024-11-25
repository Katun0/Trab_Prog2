<?php

namespace App\Controller;

use App\Entity\Agendamento;
use App\Form\AgendamentoFormType;
use App\Repository\AgendamentoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AgendamentoController extends AbstractController
{
    #[Route('/agendamento', name: 'app_agendamento')]
    public function index(
        Request $request,
        EntityManagerInterface $em,
        AgendamentoRepository $arep
    ): Response {
        $agendamentos = $arep->findAll();
        
        // Formulário de criação de novo agendamento
        $novoAgendamento = new Agendamento();
        $formNovo = $this->createForm(AgendamentoFormType::class, $novoAgendamento);
    
        $formNovo->handleRequest($request);
    
        // Verifica se o formulário de criação foi submetido
        if ($formNovo->isSubmitted() && $formNovo->isValid()) {
            $em->persist($novoAgendamento);
            $em->flush();
    
            $this->addFlash('success', 'Novo agendamento criado com sucesso!');
            return $this->redirectToRoute('app_agendamento');
        }
        $formsEdicao = [];
        foreach ($agendamentos as $agendamento) {
            $form = $this->createForm(AgendamentoFormType::class, $agendamento, [
                'action' => $this->generateUrl('app_agendamento_editar', ['id' => $agendamento->getId()]),
                'method' => 'POST',
            ]);
            $formsEdicao[$agendamento->getId()] = $form->createView();
        }
    
        // Retorna os dados ao template
        return $this->render('agendamento/index.html.twig', [
            'titulo' => 'Agendamentos',
            'formNovo' => $formNovo->createView(),
            'formsEdicao' => $formsEdicao,
            'agendamentos' => $agendamentos,
        ]);

        return $this->render('agendamento/index.html.twig', [
            'titulo' => 'Agendamentos',
            'formNovo' => $formNovo->createView(),
            'agendamentos' => $agendamentos,
        ]);
    }

    #[Route('/agendamento/{id}/editar', name: 'app_agendamento_editar')]
    public function editar(
        Request $request,
        EntityManagerInterface $em,
        $id,
        AgendamentoRepository $arep
    ): Response {
        $agendamento = $arep->find($id);
    
        if (!$agendamento) {
            throw $this->createNotFoundException("Agendamento com ID $id não encontrado.");
        }
    
        $formEdicao = $this->createForm(AgendamentoFormType::class, $agendamento);
        $formEdicao->handleRequest($request);
    
        if ($formEdicao->isSubmitted() && $formEdicao->isValid()) {
            $em->flush();
    
            $this->addFlash('success', 'Agendamento atualizado com sucesso!');
            return $this->redirectToRoute('app_agendamento');
        }
    
        // Passar agendamentos e o formulário de edição para reutilizar o template
        $agendamentos = $arep->findAll();
    
        $formsEdicao = [];
        foreach ($agendamentos as $item) {
            $form = $this->createForm(AgendamentoFormType::class, $item, [
                'action' => $this->generateUrl('app_agendamento_editar', ['id' => $item->getId()]),
                'method' => 'POST',
            ]);
            $formsEdicao[$item->getId()] = $form->createView();
        }
    
        return $this->render('agendamento/index.html.twig', [
            'titulo' => 'Editar Agendamento',
            'agendamentos' => $agendamentos,
            'formsEdicao' => $formsEdicao,
            'formNovo' => $this->createForm(AgendamentoFormType::class, new Agendamento())->createView(),
        ]);
    }
    
}
