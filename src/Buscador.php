<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private ClientInterface $client;
    private Crawler $crawler;

    public function __construct(Crawler $crawler, ClientInterface $client)
    {
        $this->client = $client;
        $this->crawler = $crawler;
    }

    public function buscar(string $url): array
    {

        $resposta = $this->client->request('GET', $url);
        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);
        $elementosDom = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];
        foreach ($elementosDom as $elemento) {
            $cursos[] = $elemento->textContent;
        }
        return $cursos;
    }
}
