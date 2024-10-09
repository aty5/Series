<?php

namespace App\Controller;

use App\Repository\SerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    /**
     * @Route("/series", name="app_serie_list")
     */
    public function list(SerieRepository $serieRepository): Response
    {
        // éviter d'utiliser findALL
        $series = $serieRepository->findBy([], ['popularity' => 'DESC',
            'vote' => 'DESC']);


        return $this->render('serie/list.html.twig', [
            "series" => $series
        ]);
    }

    /**
     * @Route("/series/details/{id}", name="app_serie_details")
     */
    public function details(int $id, SerieRepository $serieRepository): Response
    {
        $serie = $serieRepository->find($id);

        return $this->render('serie/details.html.twig', [
            "serie" => $serie
        ]);
    }

    /**
     * @Route("/series/create", name="app_serie_create")
     */
    public function create(): Response
    {
        return $this->render('serie/create.html.twig', [
        ]);
    }
}
