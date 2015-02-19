<?php


namespace Beni\BdthequeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class SeriesForm
 *
 * @package Beni\BdthequeBundle\Form
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class SeriesForm  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beni\BdthequeBundle\Document\Series'
        ));
    }

    public function getName()
    {
        return 'beni_bdthequebundle_Seriesform';
    }
}

