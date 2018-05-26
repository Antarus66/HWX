<?php

namespace App\Http\Controllers\Api;

use App\Entity\Car;
use App\Http\Controllers\Controller;
use App\Manager\CarManager;

class CarController extends Controller
{
    private $carManager;

    public function __construct(CarManager $carManager)
    {
        $this->carManager = $carManager;
//        $this->middleware('auth');
    }

    /**
     * Return list of accessible cars
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCarList()
    {
        $car = new Car();
        $this->authorize('create', $car);

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
            $this->authorize('create', $car);
            return response()->json($car->toArray());
        }
    }

}
