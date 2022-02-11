<?php

namespace App\Services;

use App\Models\Plant;
use App\Services\Plants\PlantPhotoService;

class PlantService {
    private PlantPhotoService $plantPhotoService;

    public function __construct() {
        $this->plantPhotoService = new PlantPhotoService();
    }

    public function storeNewPlant($name, $species, $watering_instructions, $photo)
    {
        $photo_path = $this->plantPhotoService->storeNewPlantPhoto($photo);

        Plant::create([
            'name' => $name,
            'watering_instructions' => $watering_instructions,
            'species' => $species,
            'photo_name' => $photo_path
        ]);
    }
}
