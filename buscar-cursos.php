<?php

require 'vendor/autoload.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

Teste::metodo();

$cliente = new Client(['base_uri' => 'https://www.alura.com.br']);
$crawler = new Crawler();
$buscador = new Buscador($crawler , $cliente);



$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach($cursos as $curso){
    exibeMensagem($curso);
}