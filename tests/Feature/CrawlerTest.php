<?php

namespace Tests\Feature;

use App\Http\Controllers\CrawlerController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrawlerTest extends TestCase
{

    /** @test */
    public function retorna_estrutura_html_sucesso()
    {
        $response = $this->get('/crawler');
        $docment = $response->getContent();
        $this->assertStringContainsString('Resposta', $docment);
        $response->assertStatus(200);
    }

    /** @test */
    public function retorna_csrf_string_sucesso()
    {
        $crawle = new CrawlerController();
        $response = $crawle->getCSRF();
        $this->assertIsString($response);
    }

    /** @test */
    public function retorna_csrf_length_sucesso()
    {
        $crawle = new CrawlerController();
        $response = $crawle->getCSRF();
        $this->assertEquals(32, strlen($response));
    }

    /** @test */
    public function retorna_csrf_length_maior_32_erro()
    {
        $crawle = new CrawlerController();
        $response = $crawle->getCSRF();
        $this->assertNotEquals(32, strlen($response.'faskfis'));
    }
}
