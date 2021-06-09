<?php

namespace App\Form;

use App\Entity\WorkersQualificationCoefficients;
use App\Entity\AggregatesWTO;
use App\Entity\MaintenancePersonnel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class WorkersQualificationCoefficientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qualificationCoefficient', TextType::class, [
                'label' => 'Коэфициент квалификации']
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
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => WorkersQualificationCoefficients::class,
        ]);
    }
}
