<?php

namespace App\Repository;

use App\Entity\Titulacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Titulacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Titulacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Titulacion[]    findAll()
 * @method Titulacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TitulacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Titulacion::class);
    }

    // /**
    //  * @return Titulacion[] Returns an array of Titulacion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Titulacion
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
