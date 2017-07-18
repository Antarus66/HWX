<?php

namespace App\Http\Controllers\Api;

class CarController extends \App\Http\Controllers\Api\Admin\CarController
{
    /**
     * Return list of accessible cars
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCarList()
    {
        $cars = $this->carManager->findAll();

        return response()->json(
            $cars->toArray()
        );
    }

    /**
     * Get car by id
     * @param int $id
     * @return \Illuminate\Http\JsonResponse||void
     */
    public function getCar(int $id)
    {
        $car = $this->carManager->findById($id);

        if ($car === null) {
            return response('No', 404);
        } else {
            return response()->json($car->toArray());
        }
    }

}
