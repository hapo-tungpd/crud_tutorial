<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Input;
use Image;
use File;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return view('index', ['employee' => $employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|email|unique:employees',
            'name' => 'required',
            'age' => 'required|integer',
            'sex' => 'required',
            'phonenumber' => 'required|numeric',
            'skill' => 'required',
        ], [
            'email.unique' => 'Email has been already exists',
        ]);
        $employees = new Employee();
        if ($request->hasFile('avata')) {
            $file = $request->avata;
            $file->move('img', $file->getClientOriginalName());
            $employees->image = $file->getClientOriginalName();
        }
        $employees->name = $request->input('name');
        $employees->age = $request->input('age');
        $employees->sex = $request->input('sex');
        $employees->email = $request->input('email');
        $employees->phonenumber = $request->input('phonenumber');
        $employees->skill = $request->input('skill');
        $employees->save();
        $request->session()->flash('success', "Employee Save Successfully!");
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $Search = $request->search_code; //get data from FORM
        $employees = DB::table('employees')->where('name', 'like', "$Search")->paginate(10);
        return view('show', compact('employees', 'Search'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employee::findOrFail($id);
        return view('edit', ['employees' => $employees]);
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
        //
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required|integer',
            'sex' => 'required',
            'phonenumber' => 'required|numeric',
            'skill' => 'required',
        ], [
            //notification
        ]);
        $employees = Employee::findOrFail($id);
        if($request->hasFile('avata')) {
            $file1 = $employees->image;
            File::delete('img/' . $file1);
            $file = $request->avata;
            $file->move('img', $file->getClientOriginalName());
            $employees->image = $file->getClientOriginalName();
            $employees->save();
        }
        $employees->name = $request->input('name');
        $employees->age = $request->input('age');
        $employees->sex = $request->input('sex');
        $employees->email = $request->input('email');
        $employees->phonenumber = $request->input('phonenumber');
        $employees->skill = $request->input('skill');
        $employees->save();
        $request->session()->flash('success', "Employee Update Successfully!");
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::where('id', $id)
        ->delete();
        $request->session()->flash('success', "Employee Delete Successfully!");
        return redirect()->route('employee.index');

    }
    //show list search employee
    public function show($id)
    {
        $employees = Employee::findOrFail($id);
        return view('read', ['employee' => $employees]);
    }
}
