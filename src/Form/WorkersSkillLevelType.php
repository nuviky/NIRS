<?php

namespace App\Form;

use App\Entity\WorkersSkillLevel;
use App\Entity\TypesOfWTO;
use App\Entity\MaintenancePersonnel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class WorkersSkillLevelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('skillLevel', TextType::class, [
                'label' => 'Уровень квалификации']
            )
            ->add('maintenancePersonnel', EntityType::class, [
                'class' => MaintenancePersonnel::class,
                'label' => 'Группа']
            )
            ->add('relation', EntityType::class, [
                'class' => TypesOfWTO::class,
                'label' => 'Вид ВТО']
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => WorkersSkillLevel::class,
        ]);
    }
}
