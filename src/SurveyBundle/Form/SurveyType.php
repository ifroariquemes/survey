<?php

namespace SurveyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use SurveyBundle\Entity\Survey;

class SurveyType extends AbstractType {

    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title', TextType::class, ['label' => 'Título'])
                ->add('description', TextAreaType::class, ['label' => 'Descrição']);
    }

    public function configureOptions(\Symfony\Component\OptionsResolver\OptionsResolver $resolver) {
        $resolver->setDefaults(['data_class' => Survey::class]);
    }

}
