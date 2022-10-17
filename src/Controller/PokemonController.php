<?php

namespace App\Controller;

use App\Entity\Pokemon;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PokemonController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/pokemon", name="app_pokemon")
     */
    public function index(): Response
    {
        return $this->render('pokemon/index.html.twig', [
            'controller_name' => 'PokemonController',
        ]);
    }

    /**
     * @Route("/pokemon/gen/{gen}", name="app_pokemon_gen")
     */
    public function gen($gen): Response
    {
        //$pokemons = $this->entityManager->getRepository(Pokemon::class)->findBy(['generation' => $gen]);
        $pokemons = $this->entityManager->getRepository(Pokemon::class)->getPokemonByGen($gen);

        if(empty($pokemons)) {
            return $this->redirectToRoute('app_pokemon_gen' ,['gen' => 1]);
        }
        return $this->render('pokemon/gen.html.twig', [
            'pokemons' => $pokemons
        ]);
    }

    /**
     * @Route("/pokemon/{id}", name="app_pokemon_show")
     */
    public function show($id): Response
    {
        $pokemon = $this->entityManager->getRepository(Pokemon::class)->findOneBy(['id' => $id]);
        return $this->render('pokemon/show.html.twig', [
            'pokemon' => $pokemon
        ]);
    }
}
