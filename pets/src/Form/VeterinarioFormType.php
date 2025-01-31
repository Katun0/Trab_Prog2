<?php 

namespace App\Form;

use App\Entity\Veterinario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VeterinarioFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('cpf', TextType::class, ['label' => 'CPF'])
        ->add('crmv', TextType::class, ['label' => 'CRMV'])
        ->add('contato', TextType::class,['label' => 'Telefone']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Veterinario::class,
        ]);
    }

    public function getParent(): string
    {
        return RegistrationFormType::class; // Herda campos comuns de User
    }
}


?>