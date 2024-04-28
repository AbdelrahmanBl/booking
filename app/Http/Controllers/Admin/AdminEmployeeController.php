<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EmployeeType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminEmployeeRequest;
use App\Models\Employee;

class AdminEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->successResponse([
            'employeeTypeOptions' => EmployeeType::options(),
            'tableData' => Employee::query()->latest('id')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminEmployeeRequest $request)
    {
        $employee = Employee::query()->create($request->validated());

        return $this->successResponse($employee->toArray(), __('messages.created'));
    }

    /**
     * Display the specified resource.
     */
    // public function show(Employee $employee)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        return $this->successResponse($employee->toArray(), __('messages.updated'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return $this->successResponse([], __('messages.deleted'));
    }
}
