<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; //nos da métodos de accedo directo (atajos)
use Symfony\Component\HttpFoundation\Response; //Es una biblioteca de Symfony para Peticiones, Respuesta, Sesión
use Symfony\Component\Routing\Annotation\Route;
// use Twig\Environment;

use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    // public function homepage(Environment $twig): Response //Renderizar por medio del servicio de Twig, y para saber cómo se llama dicho servicio, desde la Terminal podemos ejecutar: symfony console debug:autowiring twig
    public function homepage(): Response
    {
        $planes = [
            ['nombre' => 'Plan de 5 Mbps', 'costo' => 'Q10'],
            ['nombre' => 'Plan de 8 Mbps', 'costo' => 'Q20'],
            ['nombre' => 'Plan de 10 Mbps', 'costo' => 'Q30'],
            ['nombre' => 'Plan de 12 Mbps', 'costo' => 'Q40'],
            ['nombre' => 'Plan de 15 Mbps', 'costo' => 'Q50'],
            ['nombre' => 'Plan de 20 Mbps', 'costo' => 'Q60'],
        ];

        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'Infunisa',
            'planes' => $planes,
        ]);

        //Renderizar por medio del servicio Twig
        // $html = $twig->render('vinyl/homepage.html.twig', [
        //     'title' => 'Infunisa',
        //     'planes' => $planes,
        // ]);

        // // dd($html);

        // return new Response($html);
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        $tracks = [
            ['tipoServicio' => 'Academia de computación y mecanografía computarizada', 'costo' => 'Según curso'],
            ['tipoServicio' => 'Desarrollo de software', 'costo' => 'Según análisis'],
            ['tipoServicio' => 'Servicio de Internet Ilimitado residencial', 'costo' => 'Según plan'],
            ['tipoServicio' => 'Reparación de computadoras', 'costo' => 'Según análisis'],
        ];

        // dd($tracks);
        // dump($tracks);

        // die('INFUNISA');
        // return new Response('<h1>INFUNISA</h1>');
        return $this->render('vinyl/about.html.twig', [
            'title' => 'Infunisa',
            'servicios' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
        // return new Response('<h1>IZABAL</h1>');
        // return new Response('Genre: ' . $slug);
        // $title = str_replace('-', ' ', $slug);

        // if ($slug) {
        //     $title = 'Genre: ' . u(str_replace('-', ' ', $slug))->title(true);
        // } else {
        //     $title = ('Genre: Infunisa');
        // }

        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        // return new Response($title);
        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre,
        ]);
    }
}
