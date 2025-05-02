<?php

namespace App\Repository;

use App\Entity\GrupoMuscular;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GrupoMuscular>
 *
 * @method GrupoMuscular|null find($id, $lockMode = null, $lockVersion = null)
 * @method GrupoMuscular|null findOneBy(array $criteria, array $orderBy = null)
 * @method GrupoMuscular[]    findAll()
 * @method GrupoMuscular[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GrupoMuscularRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GrupoMuscular::class);
    }

    public function getGrupoById($id): GrupoMuscular
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function getGrupoByName($nombre): GrupoMuscular
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.nombre = :nombre')
            ->setParameter('nombre', $nombre)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }











    //    /**
    //     * @return GrupoMuscular[] Returns an array of GrupoMuscular objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('g.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?GrupoMuscular
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
