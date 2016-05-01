<?php

namespace Formaland\CatalogueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategorieType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('status','checkbox',array('required'=>false))
           /* ->add("sexe","choice",array('choices'=>array('0'=>'Homme',
                                                          '1'=>'Femme',
                                                          '2'=>'autre'    ),'preferred_choice')
            ->add("date","datetime")  
            ->add("contenu","textarea")
            ->add("pays","country")*/
                   
           ->add('token',"hidden")
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Formaland\CatalogueBundle\Entity\Categorie'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'formaland_cataloguebundle_categorie';
    }
}
