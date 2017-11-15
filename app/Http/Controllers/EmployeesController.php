<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::all();
        return view('employees.home',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createEmployee = new Employee();
        $createEmployee->lastname = $request->lastname;
        $createEmployee->firstname = $request->firstname;
        $createEmployee->middlename = $request->middlename;
        $createEmployee->jobdescription = $request->jobdescription;
        $createEmployee->residence = $request->residence;
        $createEmployee->contact = $request->contact;

        $createEmployee->save();

        return redirect(route('employees.index'))->with('message','Employee added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showEmployee = Employee::find($id);
        return view('employees.show',compact('showEmployee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editDetails = Employee::find($id);
        return view('employees.edit',compact('editDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateEmployee = Employee::find($id);
        $updateEmployee->lastname = $request->lastname;
        $updateEmployee->firstname = $request->firstname;
        $updateEmployee->middlename = $request->middlename;
        $updateEmployee->jobdescription = $request->jobdescription;
        $updateEmployee->residence = $request->residence;
        $updateEmployee->contact = $request->contact;

        $updateEmployee->save();

        return redirect(route('employees.index'))->with('message','Employee details updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteEmployee = Employee::find($id);
        $deleteEmployee->delete();

        return redirect(route('employees.index'))->with('message','Employee deleted successfully');
    }
}
