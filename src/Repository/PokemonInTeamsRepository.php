<?php

namespace App\Repository;

use App\Entity\PokemonInTeams;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PokemonInTeams>
 *
 * @method PokemonInTeams|null find($id, $lockMode = null, $lockVersion = null)
 * @method PokemonInTeams|null findOneBy(array $criteria, array $orderBy = null)
 * @method PokemonInTeams[]    findAll()
 * @method PokemonInTeams[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PokemonInTeamsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PokemonInTeams::class);
    }

    public function add(PokemonInTeams $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PokemonInTeams $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PokemonInTeams[] Returns an array of PokemonInTeams objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PokemonInTeams
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
