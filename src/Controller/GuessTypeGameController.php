<?php

namespace App\Controller;

use App\Entity\Types;
use App\Classes\GameGuessesBuilder;
use App\Manager\GuessTypeGameManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GuessTypeGameController extends AbstractController
{
    private $entityManager;
    private $GuessTypeGameManager;

    public function __construct(EntityManagerInterface $entityManager, GuessTypeGameManager $GuessTypeGameManager) {
        $this->entityManager = $entityManager;
        $this->GuessTypeGameManager = $GuessTypeGameManager;
    }

    /**
     * @Route("/guess_type/game/init", name="app_guess_type_game_init")
     */
    public function init(): Response
    {
        /*$array1 = ['A', 'B'];
        $array2 = ['A', null];

        dd(array_diff($array2, array_filter($array1)));*/
        return $this->render('game/init.html.twig', [
        ]);
    }

    /**
     * @Route("/guess_type/game/start", name="app_guess_type_game_start")
     */
    public function start(Request $request): Response
    {
        $properties = $request->request->all();
        $this->GuessTypeGameManager->init($properties);
        return $this->redirectToRoute('app_guess_type_game_play');
    }

    /**
     * @Route("/guess_type/game", name="app_guess_type_game")
     */
    public function index(): Response
    {
        if($this->GuessTypeGameManager->getState()) {
            return $this->redirectToRoute('app_guess_type_game_play');
        }

        return $this->redirectToRoute('app_guess_type_game_end');
    }

    /**
     * @Route("/guess_type/game/play", name="app_guess_type_game_play")
     */
    public function play(): Response
    {
        $types = $this->entityManager->getRepository(Types::class)->findAll();
        $pokemon = $this->GuessTypeGameManager->GetRandomPokemon();
        return $this->render('game/play.html.twig', [
            'types' => $types,
            'pokemon' => $pokemon
        ]);
    }

    /**
     * @Route("/guess_type/game/result", name="app_guess_type_game_result")
     */
    public function result(Request $request, SessionInterface $session, GameGuessesBuilder $gameguessesbuilder): Response
    {
        $choices = $request->request->all();
        $gameguesses = $gameguessesbuilder->builder($choices);
        $points = $this->GuessTypeGameManager->calcPoints($gameguesses);

        $pokemon = $session->get('pokemon');

        $game = $session->get('game');

        return $this->render('game/result.html.twig', [
            'choices' => $gameguesses,
            'pokemon' => $pokemon['pokemon'],
            'points' => $points,
            'game' => $game['game']
        ]);
    }

    /**
     * @Route("/guess_type/game/end", name="app_guess_type_game_end")
     */
    public function end(SessionInterface $session): Response
    {
        $game = $session->get('game');

        return $this->render('game/endresult.html.twig', [
            'results' => $game['game']
        ]);

    }
}
