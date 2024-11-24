<?php

namespace App\Form;

use App\Entity\Agendamento;
use App\Entity\User;
<<<<<<< HEAD
use App\Entity\Servico;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


=======
use App\Entity\servico;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

>>>>>>> 2d58c410fbb1caf7b679b3b0396c1aa5a5047edc
class AgendamentoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
<<<<<<< HEAD
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
=======
            ->add('data_agendamento', null, [
                'widget' => 'single_text'
            ])
            ->add('descricao')
            ->add('user', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
            ])
            ->add('servico', EntityType::class, [
                'class' => Servico::class,
'choice_label' => 'id',
            ])
        ;
>>>>>>> 2d58c410fbb1caf7b679b3b0396c1aa5a5047edc
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Agendamento::class,
        ]);
    }
}
