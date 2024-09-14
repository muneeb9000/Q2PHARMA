<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Departments;
use App\Models\Designations;
use App\Models\companies;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = companies::all();
        $departments = Departments::all();
        $designations = Designations::all();
        $employees = Employee::with('company','department','designation')->get();
        return view('employees.list', compact('employees','companies','departments','designations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $companies = companies::all();
        $departments = Departments::all();
        $designations = Designations::all();
        return view('employees.add', compact('companies','departments','designations','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee = Employee::create([
            'company_id' => $request->company_id,
            'joining_date' => $request->joining_date,
            'designation_id' => $request->designation_id,
            'department_id' => $request->department_id,
            'qualification' => $request->qualification,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'blood_group' => $request->blood_group,
            'dob' => $request->dob,
            'number' => $request->number,
            'address' => $request->address,
            'name' => $request->name,
            'email' => $request->email,
        ]);
        $password = bcrypt($request->password);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'role_id' => $request->role_id,
        ]);
        return redirect()->route('employee.index')->with('success', 'Employee created successfully.');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::all();
        $companies = companies::all();
        $departments = Departments::all();
        $designations = Designations::all();
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee','roles','companies','departments','designations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $user = User::where('email', $employee->email)->firstOrFail();
        $employee->update([
            'company_id' => $request->input('company_id'),
            'joining_date' => $request->input('joining_date'),
            'designation_id' => $request->input('designation_id'),
            'department_id' => $request->input('department_id'),
            'qualification' => $request->input('qualification'),
            'gender' => $request->input('gender'),
            'religion' => $request->input('religion'),
            'blood_group' => $request->input('blood_group'),
            'dob' => $request->input('dob'),
            'number' => $request->input('number'),
            'address' => $request->input('address'),
            'name' => $request->input('name'),
        ]);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
            'password' => $request->filled('password') ? bcrypt($request->input('password')) : $user->password, 
        ]);

        return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $user = User::where('email', $employee->email)->first();
        if ($user) {
            $user->delete();
        }
        $employee->delete();
        return redirect()->route('employee.index')->with('success', 'Employee and associated user deleted successfully.');
    }
    
}
