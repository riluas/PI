<?php

namespace App\Repository;

use App\Entity\Pi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Pi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pi[]    findAll()
 * @method Pi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pi::class);
    }

    // /**
    //  * @return Pi[] Returns an array of Pi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pi
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
