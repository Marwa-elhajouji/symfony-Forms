<?php

namespace App\Repository;

use App\Entity\SymfonyConsoleMakeUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SymfonyConsoleMakeUser>
 *
 * @method SymfonyConsoleMakeUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method SymfonyConsoleMakeUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method SymfonyConsoleMakeUser[]    findAll()
 * @method SymfonyConsoleMakeUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SymfonyConsoleMakeUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SymfonyConsoleMakeUser::class);
    }

//    /**
//     * @return SymfonyConsoleMakeUser[] Returns an array of SymfonyConsoleMakeUser objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SymfonyConsoleMakeUser
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
