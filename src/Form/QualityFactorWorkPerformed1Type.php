<?php

namespace App\Form;

use App\Entity\QualityFactorWorkPerformed;
use App\Entity\TypesOfEMAR;
use App\Entity\MaintenancePersonnel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class QualityFactorWorkPerformedType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qualityFactor', TextType::class, [
                'label' => 'Уровень квалификации']
            )
            ->add('maintenancePersonnel', EntityType::class, [
                'class' => MaintenancePersonnel::class,
                'label' => 'Группа']
            )
            ->add('TypeOfEMAR', EntityType::class, [
                'class' => TypesOfEMAR::class,
                'label' => 'Виды ТО и РО']
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => QualityFactorWorkPerformed::class,
        ]);
    }
}
