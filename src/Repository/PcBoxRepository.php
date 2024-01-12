<?php

namespace App\Repository;

use App\Entity\PcBox;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PcBox>
 *
 * @method PcBox|null find($id, $lockMode = null, $lockVersion = null)
 * @method PcBox|null findOneBy(array $criteria, array $orderBy = null)
 * @method PcBox[]    findAll()
 * @method PcBox[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PcBoxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PcBox::class);
    }

//    /**
//     * @return PcBox[] Returns an array of PcBox objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PcBox
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
