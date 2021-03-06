<?php

namespace UbicacionBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * LocalidadRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LocalidadRepository extends EntityRepository
{
    public function getByLike($string, $extraParam = null) {

        $em = $this->getEntityManager();

        $consulta = $em->createQuery('SELECT l
                                          FROM UbicacionBundle:Localidad l
                                          WHERE upper(l.descripcion) LIKE upper(:string)
                                     ');


        $consulta->setParameter('string', '%' . $string . '%');


        $return = $consulta->getArrayResult();

        return $return;
    }
}
