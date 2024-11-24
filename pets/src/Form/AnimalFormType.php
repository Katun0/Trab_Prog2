<?php 

namespace App\Form;

use App\Entity\AnimalTipo;
use App\Entity\Raca;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;

class AnimalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) : void
    {
        $builder
        ->add('nome', TextType::class, ['label' => 'Nome:'])
        ->add('idade', NumberType::class, 
        ['label' => 'Idade:',
        'scale' => 2,
        'attr' => [
            'step' => '0.01',
            'placeholder' => 'Ex: 3.5 (3 anos e 5 meses)'
        ]])
        ->add('tipo', EntityType::class,
        [
            'class' => AnimalTipo::class,
            'choice_label' => 'Nome',
            'label' => 'Tipo',
            'placeholder' => 'Selecione do tipo do animal'
        ])

        ->add('raca', EntityType::class, 
        ['class' => Raca::class,
        'choice_label' => 'Nome',
        'label' => 'Raça',
        'placeholder' => 'Selecione a raça']
    )
        ->add('foto', FileType::class, [
            'label' => 'Foto',
            'mapped' => false,
            'required' => false,
            'constraints' => [
                new File([
                    'maxSize' => '2M',
                    'mimeTypes' => [
                        'image/jpeg',
                        'iamge/png',
                    ],
                    'mimeTypesMessage' => 'Por favor, envie um arquivo válido',
                ])
            ]
        ]);
    }
    
}
?>