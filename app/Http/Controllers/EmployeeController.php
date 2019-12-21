<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\StoreEmployeeRequest as StoreRequest;
use App\Http\Requests\StoreEmployeeRequest as UpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class EmployeeController extends Controller {

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        return view('employee.index')->withEmployees(Employee::paginate(config('ok-tamam.pagination')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('employee.create')->withCompanies(Company::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        Employee::create($request->validated());
        return redirect()->route('employees.index')->withSuccess('Employee saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return View
     */
    public function show(Employee $employee)
    {
        return view('employee.show')->withEmployee($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return View
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit')
            ->withEmployee($employee)
            ->withCompanies(Company::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->route('employees.show', $employee)->withSuccess('Employee updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->withSuccess('Employee deleted Successfully');
    }
}
