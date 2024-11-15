<?php

namespace App\Controller;

use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController
{

        #[Route("/", name:"film_list")]

    public function index(EntityManagerInterface $entityManager): Response
    {
        $films = $entityManager->getRepository(Film::class)->findAll();
        return $this->render('film/index.html.twig', [
            'films' => $films,
        ]);
    }

    
    // src/Controller/FilmController.php

    #[Route("/films/{id}", name:"film_detail")]
    public function show(Film $film): Response
    {
        return $this->render('film/show.html.twig', [
            'film' => $film,  // Passez l'objet film à la vue
        ]);
    }



    
        #[Route("/film", name:"app_film")]
    
    public function filmPage(): Response
    {
        return $this->render('film/index.html.twig', [
            'controller_name' => 'FilmController',
        ]);
    }
}
