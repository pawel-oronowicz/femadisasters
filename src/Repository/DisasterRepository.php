<?php

namespace App\Repository;

use App\Entity\Disaster;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
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
    private EntityManagerInterface $em;

    public function __construct(
        ManagerRegistry $registry,
        EntityManagerInterface $entityManager
    )
    {
        parent::__construct($registry, Disaster::class);
        $this->em = $entityManager;
    }

    /**
     * Returns ID of the latest Disaster entry
     *
     * @return int
     * @throws NonUniqueResultException
     */
    public function findLatestDisasterNumber(): int
    {
        $disaster = $this->createQueryBuilder('d')
            ->orderBy('d.disasterNumber', 'DESC')
            ->getQuery()
            ->getOneOrNullResult();

        if($disaster) {
            return $disaster->getDisasterNumber();
        } else {
            return 0;
        }
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
