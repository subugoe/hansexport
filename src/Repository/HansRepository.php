<?php

namespace App\Repository;

use App\Entity\Hans;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hans|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hans|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hans[]    findAll()
 * @method Hans[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HansRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hans::class);
    }
}
