<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller{

    public function index()
    {
       $employees = Employee::all();
       return EmployeeResource::collection($employees);
    }


    public function create()
    {
        //
    }


    public function store(EmployeeStoreRequest $request)
    {
       $employee = Employee::create($request->validated());
       return response()->json($employee);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
