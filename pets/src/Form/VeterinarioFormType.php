<?php 

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;

class VeterinarioFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) : void
    {
        $builder
        ->add('nome', TextType::class, ['label' => 'Nome: '])
        ->add('sobrenome', TextType::class, ['label' => 'Sobrenome'])
        ->add('cpf', TextType::class, ['label' => 'CPF'])
        ->add('crmv', TextType::class, ['label' => 'CRMV'])
        ->add('contato', TextType::class,['label' => 'Telefone'])
        ->add('Salvar', SubmitType::class);
    }
}


?>