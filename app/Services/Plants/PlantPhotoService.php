<?php

namespace App\Services\Plants;

class PlantPhotoService {

    public function storeNewPlantPhoto($photo)
    {
        return $photo->store('public/plants');
    }
}
