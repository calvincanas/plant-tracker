<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Plant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlantControllerTest extends TestCase
{
    Use RefreshDatabase;

    /**
     * @return void
     */
    public function test_homepage_all_persisted_plants_show()
    {
        $firstPlant = Plant::factory()->create();
        $secondPlant = Plant::factory()->create();
        $response = $this->get('/');
        $response->assertSee($firstPlant->name);
        $response->assertSee($secondPlant->name);
        $response->assertStatus(200);
    }

    public function test_homepage_should_not_show_not_existing_plant()
    {
        $response = $this->get('/');
        $response->assertDontSee('Plant A');
        $response->assertStatus(200);
    }
}
