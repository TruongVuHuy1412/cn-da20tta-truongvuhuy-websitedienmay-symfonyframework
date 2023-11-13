<?php

namespace App\Repository;

use App\Entity\DienThoai;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DienThoai>
 *
 * @method DienThoai|null find($id, $lockMode = null, $lockVersion = null)
 * @method DienThoai|null findOneBy(array $criteria, array $orderBy = null)
 * @method DienThoai[]    findAll()
 * @method DienThoai[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DienThoaiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DienThoai::class);
    }

//    /**
//     * @return DienThoai[] Returns an array of DienThoai objects
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

//    public function findOneBySomeField($value): ?DienThoai
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
