<?php

namespace App\Form;

use App\Entity\QualityFactorWorkPerformed;
use App\Entity\TypesOfEMAR;
use App\Entity\MaintenancePersonnel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MatrixMintenancePersonnelWorkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qualityfactor', ChoiceType::class, array(
                'label' => 'Коэф. качества выполняемых работ',
                'choices'  => array(
                    '-2' => -2,
                    '-1' => -1,
                    '0' => 0,
                    '1' => 1,
                    '2' => 2,
                    '3' => 3
                    )
                )
            )
            ->add('maintenancePersonnel', EntityType::class, [
                'class' => MaintenancePersonnel::class,
                'label' => 'Группа']
            )
            ->add('TypeOfEMAR', EntityType::class, [
                'class' => TypesOfEMAR::class,
                'label' => 'Виды ТО и РО']
            )
            ->add('submit', SubmitType::class, [
                'label' => 'Внести данные'
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
