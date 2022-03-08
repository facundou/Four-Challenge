<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\City;
use App\Http\Controllers\Controller;
use Database\Seeders\City as SeedersCity;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
        
        $data = Company::latest()->paginate(5);
    
        return view('company.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company, City $city)
    {
        $company = $company->all();
        $cities = $city->all();
        return view('company.create', compact('company', 'cities'));

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
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'disponibilidad' => 'required|boolean',
            'city_id' => 'required|integer',
        ]);
        
        $company = Company::create($request->all());
        $company->city()->attach($request->city_id);
        return redirect()->route('company.index')
                        ->with('success','Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $Company)
    {
        return view('company.show',compact('Company'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $Company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $Company){

        return view('company.edit',compact('Company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $City
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, Company $Company)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'disponibilidad' => 'required'
        ]);
    
        $Company->update($request->all());
    
        return redirect()->route('company.index')
                        ->with('success','Company updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $City
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $Company)
   {
        $Company->delete();
    
        return redirect()->route('company.index')
                        ->with('success','Company deleted successfully');
    }
}