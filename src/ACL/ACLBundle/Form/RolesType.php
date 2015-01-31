<?php

namespace ACL\ACLBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RolesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('role')
            ->add('permisos','entity',array(
              'class' => 'ACLBundle:Permisos',
              'property' => 'permiso',
              "empty_value" => "Seleccione",
              'expanded' => true,
              'multiple' => true
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ACL\ACLBundle\Entity\Roles'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acl_aclbundle_roles';
    }
}
