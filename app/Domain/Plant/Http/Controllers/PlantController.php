<?php

namespace App\Domain\Plant\Http\Controllers;

use App\Domain\Plant\Repositories\PlantRepository;
use App\Domain\Plant\Services\CreatePlantService;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlantStoreRequest;
use App\Services\PlantService;

class PlantController extends Controller
{
    private PlantRepository $repo;
    public function __construct(PlantRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $plants = $this->repo->getPlants();

        return \response()->json([
            'plants' => $plants
        ]);

    }


    public function create()
    {
        return \view('plants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PlantStoreRequest $request
     * @param CreatePlantService $createPlantService
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PlantStoreRequest $request, CreatePlantService $createPlantService)
    {
        try {
            $createPlantService->create(
                $request->name,
                $request->species,
                $request->watering_instructions,
                $request->file('photo')
            );

            $responseData = [
                'status' => 'success',
                'message' => 'Created the new plant successfully'
            ];
        } catch (\Exception $e) {
            $responseData = [
                'status' => 'error',
                'message' => 'Error occurred. Please try  again.'
            ];
        }

        return \response()->json($responseData);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
