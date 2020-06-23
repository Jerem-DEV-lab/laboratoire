<?php

namespace App\Form;

use App\Entity\CategoryDelivery;
use App\Entity\Delivery;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class Delivery1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city')
            ->add('meeting')
            ->add('checkinTime')
            ->add('categoryDelivery', EntityType::class,[
                'class' => CategoryDelivery::class,
                'label' => 'Choissez une catégorie',
                'choice_label' => 'title'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Delivery::class,
        ]);
    }
}
