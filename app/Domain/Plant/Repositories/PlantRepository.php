<?php

namespace App\Domain\Plant\Repositories;

use App\Repositories\BaseRepository;
use App\Domain\Plant\Plant;

class PlantRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new Plant());
    }
}
