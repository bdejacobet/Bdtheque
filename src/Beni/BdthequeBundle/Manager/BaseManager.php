<?php


namespace Beni\BdthequeBundle\Manager;

use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Class BaseManager
 *
 * @package Beni\BdthequeBundle\Manager
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class BaseManager
{

    /**
     * @var string
     */
    protected $class;

    /**
     * @var ManagerRegistry
     */
    protected $registry;

    /**
     * @param String $class
     * @param ManagerRegistry $registry
     */
    public function __construct($class, ManagerRegistry $registry)
    {
        $this->class    = $class;
        $this->registry = $registry;
    }


    /**
     * {@inheritdoc}
     */
    public function save($entity, $andFlush = true)
    {
        $em = $this->registry->getManager();

        $em->persist($entity);

        if ($andFlush) {
            $em->flush();
        }

    }

    /**
     * {@inheritdoc}
     */
    public function remove($entity, $andFlush = true)
    {
        $em = $this->registry->getManager();

        $em->remove($entity);

        if ($andFlush) {
            $em->flush();
        }

    }
    /**
     * {@inheritdoc}
     */
    public function getById($id)
    {
        $entity = $this->registry ->getRepository($this->class) ->find($id);

        return $entity;
    }

}
