<?php 
namespace app\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;

class ClienteForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) : void
    {
        $builder
        ->add('nome', TextType::class, ['label' => 'Nome',])
        ->add('CPF_CNPJ', TextType::class, ['label' => 'CPF/CNPJ',])
        ->add('contato', TextType::class, ['label' => 'Contato',])
        ->add('email', EmailType::class)
        ->add('salvar', SubmitType::class);
    }
}
?>