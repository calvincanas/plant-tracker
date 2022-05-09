<?php

namespace App\Repositories;

use App\Contracts\BaseRepositoryContract;

class BaseRepository implements BaseRepositoryContract
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getPlantById(int $id)
    {
        return $this->db->find($id);
    }

    public function getPlants()
    {
        return $this->db->all();
    }

    public function create($data)
    {
        return $this->db->create($data);
    }

    public function update($data)
    {
        return $this->db->updateOrCreate($data);
    }

    public function destroy($id)
    {
        return $this->db->destroy($id);
    }
}
