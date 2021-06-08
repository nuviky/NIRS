<?php

namespace App\Form;

use App\Entity\WorkComplexityFactors;
use App\Entity\TypesOfEMAR;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class WorkComplexityFactorsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('workComplexityFactor', TextType::class, [
                'label' => 'Коэффициент сложности работ']
            )
            ->add('typesOfEMAR', EntityType::class, [
                'class' => TypesOfEMAR::class,
                'label' => 'Виды ТО и РО']
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => WorkComplexityFactors::class,
        ]);
    }
}
