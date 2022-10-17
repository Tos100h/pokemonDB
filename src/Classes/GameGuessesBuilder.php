<?php

namespace App\Classes;

use App\Entity\Types;
use Doctrine\ORM\EntityManagerInterface;


class GameGuessesBuilder
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function builder(array $choices) {
        $gameguesses = new GameGuesses();

        $gameguesses->setType1($this->entityManager->getRepository(Types::class)->findOneBy(['type' => $choices['t1']]));
        
        if ( $choices['t2']=='' || $choices['t2']==$choices['t1']) {
            $gameguesses->setType2(null);
        } else {
            $gameguesses->setType2($this->entityManager->getRepository(Types::class)->findOneBy(['type' => $choices['t2']]));
        }

        //dd($gameguesses);
        return $gameguesses;
    }
}