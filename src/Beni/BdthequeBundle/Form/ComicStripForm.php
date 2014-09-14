<?php


namespace Beni\BdthequeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class ComicStripForm
 *
 * @package Beni\BdthequeBundle\Form
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class ComicStripForm  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text')
            ->add('author', 'text')
            ->add('ISBN', 'text')
            ->add('editor', 'text')
            ->add('category', 'text')
            ->add('resume', 'textarea', array('required' => false))
            ->add('legal_deposit', 'date', array('required' => false))
            ->add('series', 'document', array(
                'class'    => 'Beni\BdthequeBundle\Document\Series',
                'property' => 'title',
                'multiple' => false,
                'label' => 'Série',
                'empty_value' => 'Choisir une série',
                'empty_data'  => null))
            ->add('tome', 'integer');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beni\BdthequeBundle\Document\ComicStrip'
        ));
    }

    public function getName()
    {
        return 'beni_bdthequebundle_Comicstripform';
    }
}
