<?php

namespace App\Domain\Plant\Services;

use App\Domain\Plant\Repositories\PlantRepository;

class CreatePlantService
{

    private PlantRepository $repository;

    public function __construct(PlantRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($name, $species, $watering_instructions, $photo)
    {
        $photo->store('public/plants');

        $this->repository->create([
            'name' => $name,
            'watering_instructions' => $watering_instructions,
            'species' => $species,
            'photo_name' => $photo->hashName()
        ]);
    }
}
