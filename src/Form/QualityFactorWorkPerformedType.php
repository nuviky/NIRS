<?php

namespace App\Form;

use App\Entity\QualityFactorWorkPerformed;
use App\Entity\AggregatesWTO;
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
                'label' => 'Уровень квалификации -2']
            )
            ->add('qualityFactor1', TextType::class, [
                'label' => 'Уровень квалификации -1']
            )
            ->add('qualityFactor2', TextType::class, [
                'label' => 'Уровень квалификации 0']
            )
            ->add('qualityFactor3', TextType::class, [
                'label' => 'Уровень квалификации 1']
            )
            ->add('qualityFactor4', TextType::class, [
                'label' => 'Уровень квалификации 2']
            )
            ->add('qualityFactor5', TextType::class, [
                'label' => 'Уровень квалификации 3']
            )
            ->add('maintenancePersonnel', EntityType::class, [
                'class' => MaintenancePersonnel::class,
                'label' => 'Группа']
            )
            ->add('relation', EntityType::class, [
                'class' => AggregatesWTO::class,
                'label' => 'Аггрегат ВТО']
            )
        ;
        // $builder
        //     ->add('qualityfactor', ChoiceType::class, array(
        //         'label' => 'Уровень квалификации',
        //         'choices'  => array(
        //             '-2' => -2,
        //             '-1' => -1,
        //             '0' => 0,
        //             '1' => 1,
        //             '2' => 2,
        //             '3' => 3
        //             )
        //         )
        //     )
        //     ->add('maintenancepersonnel', EntityType::class, [
        //         'class' => MaintenancePersonnel::class,
        //         'label' => 'Группа']
        //     )
        //     ->add('relation_', EntityType::class, [
        //         'class' => AggregatesWTO::class,
        //         'label' => 'Аггрегат ВТО']
        //     )
        // ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => QualityFactorWorkPerformed::class,
        ]);
    }
}
