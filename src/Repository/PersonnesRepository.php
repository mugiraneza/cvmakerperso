<?php

namespace App\Repository;

use App\Entity\Personnes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Personnes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Personnes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Personnes[]    findAll()
 * @method Personnes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonnesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Personnes::class);
    }

     /**
      * @return Personnes[] Returns an array of Personnes objects
      */
    public function findPersonne()
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT p
                    FROM App\Entity\Personnes p
                    ORDER BY p.id ASC'
        );
        return $query->getResult();
    }


    /*
    public function findOneBySomeField($value): ?Personnes
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