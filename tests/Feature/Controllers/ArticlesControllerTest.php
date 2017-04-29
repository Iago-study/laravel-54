<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticlesControllerTest extends TestCase
{

    /** @test */
    public function list_all_items_in_json_format()
    {
        $response = $this->get('/articles');
        $response->assertStatus(200);
    }

    /** @test */
    public function store_a_new_article_ok()
    {
        $data['data'] = ['title' => 'Test Title 01', 'description' => 'long text in this place!'];
        $response = $this->post('/articles', $data['data']);

        $response->assertJson($data);
        $response->assertStatus(202);
    }

    /** @test */
    public function store_a_new_article_with_validation_error()
    {
        $data['data'] = ['title' => 'Test Title 01'];
        $response = $this->post('/articles', $data['data']);

        $response->assertStatus(500);
    }

}
