<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; //nos da métodos de accedo directo (atajos)
use Symfony\Component\HttpFoundation\Response; //Es una biblioteca de Symfony para Peticiones, Respuesta, Sesión
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{

    #[Route('/', name: 'home')]
    public function homepage(): Response
    {
        $tracks = [
            ['tipoServicio' => 'Academia de computación y mecanografía computarizada', 'costo' => 'Q100'],
            ['tipoServicio' => 'Desarrollo de software', 'costo' => 'Según análisis'],
            ['tipoServicio' => 'Servicio de Internet Ilimitado residencial', 'costo' => 'Q150'],
            ['tipoServicio' => 'Reparación de computadoras', 'costo' => 'Según análisis'],
        ];

        // die('INFUNISA');
        // return new Response('<h1>INFUNISA</h1>');
        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'Infuisa',
            'servicios' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}', name: 'browse')]
    public function browse(string $slug = null): Response
    {
        // return new Response('<h1>IZABAL</h1>');
        // return new Response('Genre: ' . $slug);
        // $title = str_replace('-', ' ', $slug);
        if ($slug) {
            $title = 'Genre: ' . u(str_replace('-', ' ', $slug))->title(true);
        } else {
            $title = ('Genre: Infunisa');
        }

        return new Response($title);
    }
}
