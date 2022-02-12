<?php

namespace App\Http\Controllers;

use App\Services\PlantService;
use Illuminate\Http\Request;
use App\Http\Requests\PlantStoreRequest;
use App\Models\Plant;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(PlantService $plantService)
    {
        $plants = $plantService->fetchAllPlants();
        
        return response()->json([
            'plants' => $plants
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PlantStoreRequest $request, PlantService $plantService)
    {
        try {
            $plantService->storeNewPlant(
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

        return response()->json($responseData);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
