<?php 

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class RacaFormType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options) : void
    {
        $builder
        ->add('Nome', TextType::class, ['label' => 'Nome'])
        ->add('Porte', ChoiceType::class, ['choices' => [
            'Pequeno' => 'pequeno', 
            'Médio' => 'medio',
            'Grande' => 'grande'
            ]])
        -> add('Salvar', SubmitType::class);
    }
}


?>