<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use App\Models\Employee;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $country = Country::all();
        return CountryResource::collection($country);
    }


    public function store(CountryStoreRequest $request)
    {
        $country = Country::create($request->validated());
        return response()->json($country);
    }

    public function show(Country $country)
    {
       return new CountryResource($country);
    }

    public function edit($id){
        //
    }

    public function update(CountryStoreRequest $request, Country $country){
        $country->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return response()->json();
    }
}
