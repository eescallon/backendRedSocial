<?php

namespace App\Repository;

use App\Entity\Typeperson;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Typeperson|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typeperson|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typeperson[]    findAll()
 * @method Typeperson[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypepersonRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Typeperson::class);
    }

//    /**
//     * @return Typeperson[] Returns an array of Typeperson objects
//     */
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
    public function findOneBySomeField($value): ?Typeperson
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
