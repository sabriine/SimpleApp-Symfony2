<?php

namespace Formaland\UserBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;

use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
class RegistrationFormType extends BaseType{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
     parent::buildForm($builder, $options);
 }
 public function getName() {
     return 'formaland_userbundle_registration';
 }
}
