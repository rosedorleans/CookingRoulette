<?php

namespace App\Controller;

use App\Entity\Meal;
use App\Repository\MealRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;


class MealController extends AbstractController {

    /**
     * @var MealRepository
     */
    private $repository;

    public function __construct(MealRepository $repository) {

        $this->repository = $repository;
    }

    /**
     * @Route("/all_meals", name="all_meals")
     * @return Response
     */
    public function index(): Response {

        /*
        $meal = new Meal();
        $meal->setNom('Pad thaï')
        ->setDescription("Le phat thai est un plat traditionnel thaïlandais à base de nouilles de riz, très apprécié et très consommé dans toute la Thaïlande.")
        ->setUrl('https://www.196flavors.com/fr/thailande-pad-thai/');
        $em = $this->getDoctrine()->getManager();
        $em->persist($meal);
        $em->flush();

        $meal = new Meal();
        $meal->setNom('Pho')
        ->setDescription("Le Pho est un bouillon de boeuf vietnamien garni de nouilles de riz, de viande de boeuf, d'herbes fraîches et de piment.")
        ->setUrl('http://cookingwithmorgane.com/fr/recette/pho-soupe-vietnamienne-au-boeuf-et-aux-pates-de-riz.html');
        $em->persist($meal);
        $em->flush();

        $meal = new Meal();
        $meal->setNom('Poulet tikka masala')
            ->setDescription("Le poulet tikka masala est un plat composé de morceaux de poulets cuits cuisinés dans une sauce de différentes épices, servis avec du riz parfumé.")
            ->setUrl('https://www.marmiton.org/recettes/recette_poulet-tikka-massala_21628.aspx');
        $em->persist($meal);
        $em->flush(); */


        $meals = $this->repository->findAll();
        $count = count($meals);


        return $this->render('pages/allMeals.html.twig', [
            'meals' => $meals,
            'count' => $count
        ]);
    }
}