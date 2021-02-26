<?php

namespace App\Repository;

use App\Entity\TransactionTerminee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransactionTerminee|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransactionTerminee|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransactionTerminee[]    findAll()
 * @method TransactionTerminee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransactionTermineeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransactionTerminee::class);
    }

    // /**
    //  * @return TransactionTerminee[] Returns an array of TransactionTerminee objects
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
    public function findOneBySomeField($value): ?TransactionTerminee
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
