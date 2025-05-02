<?php

namespace App\Repository;

use App\Entity\DetalleRutina;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DetalleRutina>
 *
 * @method DetalleRutina|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetalleRutina|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetalleRutina[]    findAll()
 * @method DetalleRutina[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetalleRutinaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DetalleRutina::class);
    }

    public function findByRutina($rutina): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.rutina = :rutina')
            ->setParameter('rutina', $rutina)
            ->getQuery()
            ->getResult()
        ;
    }


    //    /**
    //     * @return DetalleRutina[] Returns an array of DetalleRutina objects
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

    //    public function findOneBySomeField($value): ?DetalleRutina
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
