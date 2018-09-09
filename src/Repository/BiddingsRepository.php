<?php

namespace App\Repository;

use App\Entity\Biddings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Biddings|null find($id, $lockMode = null, $lockVersion = null)
 * @method Biddings|null findOneBy(array $criteria, array $orderBy = null)
 * @method Biddings[]    findAll()
 * @method Biddings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BiddingsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Biddings::class);
    }

    /**
     * @return Biddings[] Returns an array of Biddings objects
     */

    public function findBidsWithoutCurrentUser($productId, $userId)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.product_id = :prd')
            ->andWhere('b.user_id <> :usr')
            ->setParameter('prd', $productId)
            ->setParameter('usr', $userId)
            ->getQuery()
            ->getResult()
        ;
    }
    public function finIfLowerBid($productId, $bid)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.product_id = :prd')
            ->andWhere('b.bid > :bid')
            ->setParameter('prd', $productId)
            ->setParameter('bid', $bid)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Biddings
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
