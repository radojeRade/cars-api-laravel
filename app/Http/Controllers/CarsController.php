<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCarRequest;
use App\Models\Car;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $per_page = $request->query('per_page', 5);
        // $brand = $request->query('brand', '');
        // $model = $request->query('model', '');

        // $cars = Car::searchByBrand($brand)
        //     ->searchByModel($model)
        //     ->paginate($per_page);

        // return $cars;

        $perPage = $request->query('per_page', 5);
        $brand = $request->query('brand');
        $model = $request->query('model');

        return Car::query()->searchByBrand($brand)->searchByModel($model)->paginate($perPage);//query je za upit

        // if($brand){
        //     return Car::SearchByBrand($brand)->paginate($perPage);//scope
        // }
        // if($model){
        //     return Car::SearchByModel($model)->paginate($perPage);
        // }

        // $cars = Car::paginate($perPage);

        // return $cars;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCarRequest $request)
    {
        $validated = $request->validated();
        $car = Car::create([
            'brand' => $validated['brand'], // moze i ovako validacija
            'model' => $validated['model'],
            'year' => $validated['year'],
            'max_speed' => $validated['max_speed'],
            'is_automatic' => $validated['is_automatic'],
            'engine' => $validated['engine'],
            'number_of_doors' => $validated['number_of_doors'],
            
        ]);
        return $car;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);

        return $car;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCarRequest $request, $id)
    {
        $backCar = Car::findOrFail($id);
        $validated = $request->validated();
        $backCar-> update([
            'brand' => $validated['brand'], // moze i ovako validacija
            'model' => $validated['model'],
            'year' => $validated['year'],
            'max_speed' => $validated['max_speed'],
            'is_automatic' => $validated['is_automatic'],
            'engine' => $validated['engine'],
            'number_of_doors' => $validated['number_of_doors'],
            
        ]);
        return $backCar;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Car::findOrFail($id);
        $del->delete();
        return 'Item deleted';
    }
   
    
}
