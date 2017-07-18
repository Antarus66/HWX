<?php

namespace App\Http\Controllers;

use App\Entity\Car;
//use App\Http\Requests\ValidatedCarRequest;
//use App\Repositories\Contracts\CarRepositoryInterface;
use App\Manager\CarManager;
use Illuminate\Http\Request;

class CarController extends Controller
{
    protected $carManager;

    public function __construct(CarManager $carManager)
    {
        $this->carManager = $carManager;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cars = $this->carManager->findAll();

        return view('cars/index', ['cars' => $cars->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('cars/create');
    }

    public function createSimple()
    {
        return view('cars/create-simple');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ValidatedCarRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
//        $data = $request->input();

//        dd($data);

//        $car = new Car($data);

//        dd($car);

        $this->carManager->saveCar($request);
        $updatedCollection = $this->carManager->findAll();

        return view('cars/index', ['cars' => $updatedCollection->toArray()]);
    }

    public function edit($id)
    {
        $car = $this->carManager->findById($id);
        return view('cars/edit-form', $car->toArray());
    }

    public function update($id, Request $request)
    {
//        $data = $request->input();
//        $data['id'] = $id;

//        dd($data);

//        $car = new Car($data);
        $savedCar = $this->carManager->saveCar($request);

//        dd($cars);

        return view('cars/show', $savedCar->toArray());

//        return view('cars/edit-form', $car->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = $this->carManager->findById($id);

        if (is_null($car)) {
            return view('errors/404');
        }

        return view('cars/show', $car->toArray());
    }

    public function destroy($id)
    {
        $this->carManager->deleteCar($id);

//        return view('cars/index')->with(['cars' => $cars->toArray()]);
        return redirect()->route('car-list');
    }
}
