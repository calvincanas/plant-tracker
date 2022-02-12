<?php

namespace App\Services\Plants;

class PlantPhotoService
{

    public function storeNewPlantPhoto($photo)
    {
        $photo->store('public/plants');
        return $photo;
    }
}
