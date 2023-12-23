<?php

namespace App\Repository;

use App\Entity\Disaster;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Disaster>
 *
 * @method Disaster|null find($id, $lockMode = null, $lockVersion = null)
 * @method Disaster|null findOneBy(array $criteria, array $orderBy = null)
 * @method Disaster[]    findAll()
 * @method Disaster[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisasterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Disaster::class);
    }

//    /**
//     * @return Disaster[] Returns an array of Disaster objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Disaster
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
