<?php

namespace App\Manager;

use App\Entity\Pokemon;
use App\Classes\GameProperties;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class GuessTypeGameManager
{

    private $entityManager;
    private $session;

    public function __construct(EntityManagerInterface $entityManager, SessionInterface $session) {
        $this->entityManager = $entityManager;
        $this->session = $session;
    }

    public function init($properties) {
        $formes = false;
        $evol = false;
        $gen = [1, 2, 3, 4, 5, 6, 7, 8];
        $maxturn = 10;

        if(!empty($properties)) {
            if(!empty($properties['gen'])) {
                $gen= [];
                foreach($properties['gen'] as $g) {
                    $gen[] = $g;
                }
            } 

            if(!empty($properties['formes'])) {
                $formes = true;
            }

            if(!empty($properties['evol'])) {
                $evol = true;
            }

            if(!empty($properties['maxturn'])) {
                $maxturn = $properties['maxturn'];
            }

        }

        $game = new GameProperties($maxturn, $gen, $formes, $evol);
        $game->setThisTurn(1);
        $game->setPoints(0);

        $this->session->set('game', [
            'game' => $game
        ]);

        return true;
    }

    public function GetRandomPokemon() {
        $game = $this->session->get('game');

        $pokemonIdList = $this->entityManager->getRepository(Pokemon::class)->getPokemonNb($game['game']->getGen());
        $nb = random_int(0, count($pokemonIdList)-1);
        $pokemon = $this->entityManager->getRepository(Pokemon::class)->findOneBy(['id' => $pokemonIdList[$nb]]);

        $this->session->set('pokemon', [
            'pokemon' => $pokemon
        ]);

        return $pokemon;
    }

    public function calcPoints($gameguesses) {
        $goodanswers = 0;
        
        $pokemon = $this->session->get('pokemon');
        $type1 = $pokemon['pokemon']->getType1();
        $type2 = $pokemon['pokemon']->getType2();

        if ( $type2== null ) {
            if ( $gameguesses->getType1() == $type1 && $gameguesses->getType2() == null) {
                $goodanswers = 2;
            } elseif ( $gameguesses->getType1() == $type1 || $gameguesses->getType2() == $type1) {
                $goodanswers = 1;
            }
        } else {
            if ( ($gameguesses->getType1() == $type1 || $gameguesses->getType1() == $type2) && ($gameguesses->getType2() == $type1 || $gameguesses->getType2() == $type2) ) {
                $goodanswers = 2;
            } elseif ( ($gameguesses->getType1() == $type1 || $gameguesses->getType1() == $type2) || ($gameguesses->getType2() == $type1 || $gameguesses->getType2() == $type2) ) {
                $goodanswers = 1;
            }
        }

        $this->majPoints($goodanswers);

        return $goodanswers;


    }

    public function getState() {
        $game = $this->session->get('game');
        $turn = $game['game']->getThisturn();
        $turn++;
        if ($turn > $game['game']->getNbTurn()) {
            return false;
        }

        $game['game']->setThisturn($turn);
        $this->session->set('game', [
            'game' => $game['game']
        ]);
        return true;

    }



    public function majPoints($points) {
        $game = $this->session->get('game');

        $game['game']->setPoints( $game['game']->getPoints() + $points );
        $this->session->set('game', [
            'game' => $game['game']
        ]);
        
    }
}