<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\City;
use App\Models\Vuelo;
use App\Http\Controllers\Controller;
use Database\Seeders\City as SeedersCity;
use Illuminate\Http\Request;

class VueloController extends Controller
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
        $data = Vuelo::latest()->paginate(5);
    
        return view('vuelo.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company, City $city)
    {
        $company = $company::all();
        $cities = $city::all();
        return view('vuelo.create', compact('company', 'cities'));

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
            'name_aerolinea' => 'required',
            'hora_despegue' => 'required',
            'hora_llegada' => 'required',
            'ciudad_origen' => 'required',
            'ciudad_destino' => 'required'

        ]);
    
        Vuelo::create($request->all());
     
        return redirect()->route('vuelo.index')
                        ->with('success','Vuelo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vuelo  $City
     * @return \Illuminate\Http\Response
     */
    public function show(Vuelo $vuelo )
    {
    
    
        return view('vuelo.show',compact('vuelo'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vuelo  $City
     * @return \Illuminate\Http\Response
     */
    public function edit(Vuelo $vuelo)
    {
        return view('vuelo.edit',compact('vuelo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vuelo  $City
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, Vuelo $vuelo){

        $request->validate([
            'name_aerolinea' => 'required',
            'hora_despegue' => 'required',
            'hora_llegada' => 'required',
            'ciudad_origen' => 'required',
            'ciudad_destino' => 'required'

        ]);
    
        $vuelo->update($request->all());
    
        return redirect()->route('vuelo.index')
                        ->with('success','Vuelo updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vuelo  $City
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vuelo $vuelo)
    {
        $vuelo->delete();
    
        return redirect()->route('vuelo.index')
                        ->with('success','Vuelo deleted successfully');
    }
}