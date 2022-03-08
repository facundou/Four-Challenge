<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Controllers\Controller;
use Database\Seeders\City as SeedersCity;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = City::latest()->paginate(5);
        return view('city.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'nombre' => 'required'
        ]);
    
        City::create($request->all());
     
        return redirect()->route('city.index')
                        ->with('success','City created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $City
     * @return \Illuminate\Http\Response
     */
    public function show(City $City)
    {
        return view('city.show',compact('City'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $City
     * @return \Illuminate\Http\Response
     */
    public function edit(City $City){

        return view('city.edit',compact('City'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $City
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, City $City){

        $request->validate([
            'nombre' => 'required'
        ]);
    
        $City->update($request->all());
    
        return redirect()->route('city.index')
                        ->with('success','City updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $City
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $City)
    {

        $City->delete();
    
        return redirect()->route('city.index')
                        ->with('success','City deleted successfully');
    }
}