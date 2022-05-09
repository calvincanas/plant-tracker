<?php

namespace App\Contracts;

interface BaseRepositoryContract
{
    public function getPlantById(int $id);
    public function getPlants();
    public function create($data);
    public function update($data);
    public function destroy($id);
}
