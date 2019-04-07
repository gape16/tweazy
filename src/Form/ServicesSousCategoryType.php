<?php

namespace App\Form;

use App\Entity\ServicesSousCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ServicesSousCategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('Category')
            // ->add('ServicesLists', CollectionType::class, [
            // 'entry_type' => ServicesCategoryType::class,
            // 'required'=> true, 
            // 'allow_add' => true, 
            // 'by_reference' => false, 
            // 'options'=>$options
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ServicesSousCategory::class,
        ]);
    }
}
