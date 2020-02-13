<?php

namespace App\Repository;

use App\Entity\Proyecto;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Proyecto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Proyecto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Proyecto[]    findAll()
 * @method Proyecto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProyectoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Proyecto::class);
    }

     /**
      * @return Proyecto[] Returns an array of Proyecto objects
      */
    
    public function findByAdvanced($tit, $any, $prof, $grado)
    {
         $dbq=$this->createQueryBuilder('p');
            //->select(select('DISTINCT p.curso_escolar'))
            if ($tit != "") {
            $dbq->andWhere('p.titulo LIKE :tit')
            ->setParameter('tit', '%'.$tit.'%');
            }
            //->orderBy('p.id', 'ASC')
            //->setMaxResults(10)            
        
        if ($any != "") {
        $dbq->andWhere('p.curso_escolar = :anyo')
        ->setParameter('anyo', $any);
    }
        if ($prof != "") {

            $dbq->andWhere('p.prof = :prof')
            ->setParameter('prof', $prof);
        }
if ($grado != "") {
        $dbq->andWhere('p.titulacion= :grado')
        ->setParameter('grado', $grado);
    }
        return $dbq->getQuery()->getResult();
    }
    

    /*
    public function findOneBySomeField($value): ?Proyecto
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
