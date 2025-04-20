<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response; //Es una biblioteca de Symfony para Peticiones, Respuesta, Sesión
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController
{

    #[Route('/', name: 'home')]
    public function homepage(): Response
    {
        // die('INFUNISA');
        return new Response('<h1>INFUNISA</h1>');
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
