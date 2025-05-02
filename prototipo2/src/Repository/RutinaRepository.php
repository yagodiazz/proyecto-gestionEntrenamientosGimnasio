<?php

namespace App\Repository;

use App\Entity\Rutina;
use DateTimeImmutable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Rutina>
 *
 * @method Rutina|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rutina|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rutina[]    findAll()
 * @method Rutina[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RutinaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rutina::class);
    }

    public function findOneByDate(DateTimeImmutable $date): ?Rutina
    {
        $formattedDate = $date->format('Y-m-d');

        $result = $this->createQueryBuilder('r')
            ->andWhere('r.fechaCreacion >= :date')
            ->andWhere('r.fechaCreacion < :nextDate')
            ->setParameter('date', $formattedDate)
            ->setParameter('nextDate', $date->modify('+1 day')->format('Y-m-d'))
            ->getQuery()
            ->getResult();
        $lastResult = array_pop($result);

        return $lastResult;
    }

    public function findByUser($usuario): ?array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.usuario = :usuario')
            ->setParameter('usuario', $usuario)
            ->getQuery()
            ->getResult();
    }

    public function remove(Rutina $rutina): void
    {
        $this->getEntityManager()->remove($rutina);
        $this->getEntityManager()->flush();
    }




    //    /**
    //     * @return Rutina[] Returns an array of Rutina objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Rutina
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
