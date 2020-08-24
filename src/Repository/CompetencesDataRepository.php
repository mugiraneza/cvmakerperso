<?php

namespace App\Repository;

use App\Entity\CompetencesData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompetencesData|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompetencesData|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompetencesData[]    findAll()
 * @method CompetencesData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompetencesDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompetencesData::class);
    }

    // /**
    //  * @return CompetencesData[] Returns an array of CompetencesData objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CompetencesData
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
