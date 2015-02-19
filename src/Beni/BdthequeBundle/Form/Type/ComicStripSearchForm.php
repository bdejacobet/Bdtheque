<?php


namespace Beni\BdthequeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class ComicStripSearchType
 *
 * @package Beni\BdthequeBundle\Form\Type
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */

class ComicStripSearchForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',null,array(
                'required' => false,
            ))
            ->add('scenarist',null,array(
                'required' => false,
            ))
            ->add('designer',null,array(
                'required' => false,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);
        $resolver->setDefaults(array(
            // avoid to pass the csrf token in the url (but it's not protected anymore)
            'csrf_protection' => false,
            'data_class' => 'Beni\BdthequeBundle\Document\ComicStripSearch'
        ));
    }

    public function getName()
    {
        return 'comic_strip_search_type';
    }
}
