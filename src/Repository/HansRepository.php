<?php

namespace App\Repository;

use App\Entity\Hans;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Hans|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hans|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hans[]    findAll()
 * @method Hans[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HansRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Hans::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('h')
            ->where('h.something = :value')->setParameter('value', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
