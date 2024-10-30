<?php 

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class AnimalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) : void
    {
        $builder
        ->add('nome', TextType::class, ['label' => 'Nome:'])
        ->add('idade', IntegerType::class, ['label' => 'Idade:'])
        ->add('raca', ChoiceType::class, ['label' => 'Raça:' ])
        ->add('salvar', SubmitType::class);
    }

}




?>