<?php

namespace App\Form;

use App\Entity\Agendamento;
use App\Entity\User;
use App\Entity\Servico;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AgendamentoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('data_agendamento', DateTimeType::class, [
            'widget' => 'single_text',
            'label' => 'Data e Hora do Agendamento',
            'attr' => ['class' => 'form-control'],
        ])
            ->add('descricao', TypeTextType::class, ['label' => 'descrição'])
            ->add('user', EntityType::class, [
                'class' => User::class,
'choice_label' => 'nome',
            ])
            ->add('servico', EntityType::class, [
                'class' => Servico::class,
'choice_label' => 'nome',
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Não Iniciado' => 'Não Iniciado',
                    'Em Andamento' => 'Em Andamento',
                    'Finalizado' => 'Finalizado',]
            ])
            ->add('Salvar', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Agendamento::class,
        ]);
    }
}
