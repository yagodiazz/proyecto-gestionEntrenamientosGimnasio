<?php

namespace App\Repository;

use App\Entity\Maquina;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Maquina>
 *
 * @method Maquina|null find($id, $lockMode = null, $lockVersion = null)
 * @method Maquina|null findOneBy(array $criteria, array $orderBy = null)
 * @method Maquina[]    findAll()
 * @method Maquina[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaquinaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Maquina::class);
    }

    public function getMaquinaById($id): Maquina
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function add(Maquina $maquina): void
    {
        $this->getEntityManager()->persist($maquina);
        $this->getEntityManager()->flush();
    }







    //    /**
    //     * @return Maquina[] Returns an array of Maquina objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('m.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Maquina
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
