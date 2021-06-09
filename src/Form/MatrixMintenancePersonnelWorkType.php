<?php

namespace App\Form;

use App\Entity\QualityFactorWorkPerformed;
use App\Entity\AggregatesWTO;
use App\Entity\MaintenancePersonnel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MatrixMintenancePersonnelWorkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qualityfactor', ChoiceType::class, array(
                'label' => 'Уровень квалификации',
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
            ->add('maintenancepersonnel', EntityType::class, [
                'class' => MaintenancePersonnel::class,
                'label' => 'Группа']
            )
            ->add('relation_', EntityType::class, [
                'class' => AggregatesWTO::class,
                'label' => 'Аггрегат ВТО']
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}