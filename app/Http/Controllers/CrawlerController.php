<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Symfony\Component\HttpClient\HttpClient;

class CrawlerController extends Controller
{
    private $uri;
    private $client;
    private $crawler;

    public function __construct(string $uri = 'http://applicant-test.us-east-1.elasticbeanstalk.com')
    {
        $this->uri = $uri;
        $this->client = new Client();
        $this->crawler = $this->getCrawler();
    }

    private $results = [];

    private function getCrawler(string $method = 'GET', string $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 OPR/93.0.0.0'){
        return $this->client->request($method, $this->uri, [
            'headers' => [
                'User-Agent' => $userAgent
            ],
        ]);
    }

    public function getCSRF(){
        return $this->crawler->filter('input[name=token]')->first()->attr('value');
    }

    public function crawler()
    {
        try {
            $csrf = $this->getCSRF();
            $form = $this->crawler->selectButton('Descobrir resposta')->form();
            $newCrawler = $this->client->submit($form, ['token' => $csrf]);

            return view('crawler')->with('data', $newCrawler->text());

        } catch (\Exception $e) {
            return response('Não foi possível processar a requisição', 502);
        }
    }
}
