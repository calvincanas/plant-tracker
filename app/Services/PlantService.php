<?php

namespace App\Services;

use App\Models\Plant;
use App\Services\Plants\PlantPhotoService;
use Illuminate\Support\Facades\Cache;

class PlantService
{
    private PlantPhotoService $plantPhotoService;

    public function __construct()
    {
        $this->plantPhotoService = new PlantPhotoService();
    }

    public function fetchAllPlants()
    {
        $plants = Cache::get('allPlants', function () {
            return Plant::all();
        });
        return $plants;
    }

    public function storeNewPlant($name, $species, $watering_instructions, $photo)
    {
        $photo = $this->plantPhotoService->storeNewPlantPhoto($photo);

        Plant::create([
            'name' => $name,
            'watering_instructions' => $watering_instructions,
            'species' => $species,
            'photo_name' => $photo->hashName()
        ]);
    }
}
