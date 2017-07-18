<?php

namespace App\Manager;

use App\Entity\Car;
use App\Manager\Contract\CarManager as CarManagerContract;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CarManager implements CarManagerContract
{
    /**
     * Find all Cars
     *
     * @return Collection
     */
    public function findAll(): Collection
    {
        return Car::all();
    }

    /**
     * Find Car by ID
     *
     * @param int $id
     * @return Car|null
     */
    public function findById(int $id)
    {
        return Car::find($id);
    }

    /**
     * Find Cars that belongs only to active users
     *
     * @return Collection
     */
    public function findCarsFromActiveUsers(): Collection
    {
        return Car::whereHas('user', function($query) {
            return $query->whereIsActive(true);
        })->get();
    }

    /**
     * Create or Update Car
     *
     * @param Request $request
     * @return Car
     */
    public function saveCar(Request $request, $id = null): Car
    {
        $data = $request->only([
            'color',
            'model',
            'registration_number',
            'year',
            'mileage',
            'price',
        ]);

        $car = new Car($data);

        if ($id) {
            $car->setId($id);
            $car->update($data);

            return $car;
        }

        $car->save();

        return $car;
    }

    /**
     * Delete Car by ID
     *
     * @param int $carId
     * @return void
     */
    public function deleteCar(int $carId)
    {
        $car = Car::find($carId);

        if ($car) {
            $car->delete();
        }
    }
}