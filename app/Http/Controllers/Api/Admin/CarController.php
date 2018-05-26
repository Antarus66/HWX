<?php

namespace App\Http\Controllers\Api\Admin;

use App\Entity\Car;
use App\Manager\CarManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CarController extends Controller
{
    protected $carManager;

    public function __construct(CarManager $carManager)
    {
        $this->carManager = $carManager;
    }

    /**
     * Show list of car
     * Method: GET
     */
    public function index() {
        $this->authorize('create', new Car());

        return $this->getCarList();
    }

    /**
     * Add car to collection
     * Method: POST
     */
    public function store(Request $request) {
        $this->authorize('create', new Car());


        $res = $this->carManager->saveCar($request);

        return response()->json($res->toArray());
    }

    /**
     * Show car by id
     * Method: GET
     */
    public function show($id) {
        $this->authorize('create', new Car());


        return $this->getCar($id);
    }

    /**
     * Update car by id
     * Method: PUT/PATCH
     */
    public function update(Request $request, int $id) {
        $this->authorize('create', new Car());

        $oCar = $this->cars->getById($id);
        $res = $this->carManager->saveCar($request);

        return response()->json($res->toArray());
    }

    /**
     * Delete car
     * Method: DELETE
     */
    public function destroy(int $id) {
        $this->authorize('create', new Car());

        $res = $this->carManager->deleteCar($id);
        return response("", 200);
    }
}
