<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\UploadedFile;
use Storage;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlantControllerTest extends TestCase
{
    Use RefreshDatabase;

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

    public function test_new_add_plant_form_works()
    {
        $this->withoutExceptionHandling();
        Storage::fake('photos');

        $photo = UploadedFile::fake()->image('plant1.jpg');
        $response = $this->post('/plant', [
            'name' => 'Plant A',
            'species' => 'Species A',
            'watering_instructions' => 'Just once a day.',
            'photo' => $photo
        ]);

        Storage::disk('local')->assertExists('public/plants/' . $photo->hashName());
        $this->assertDatabaseCount('plants', 1);

        $response->assertSessionHas('success');
        $response->assertStatus(302);

        // manual clean up to avoid local disk of dummy image
        @unlink(storage_path('app/public/plants/' . $photo->hashName()));

    }
}
