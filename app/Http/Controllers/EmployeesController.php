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
use App\Http\Requests\StoreRequests;
use App\Http\Requests\UpdateRequests;

class EmployeesController extends Controller
{
    public function index()
    {
        $employee = Employee::orderBy("id","desc")->paginate(8);
        return view('index', ['employee' => $employee]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(StoreRequests $request)
    {
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
    
    public function search(Request $request)
    {
        $Search = $request->search_code; //get data from FORM
        $employees = Employee::where('name', 'like', "$Search")->paginate(10);
        return view('show', compact('employees', 'Search'));
    }

    public function edit($id)
    {
        $employees = Employee::findOrFail($id);
        return view('edit', ['employees' => $employees]);
    }

    public function update(UpdateRequests $request, $id)
    {
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

    public function destroy($id)
    {
        $name_img=Employee::findOrFail($id);
        if($name_img->image != "" && file_exists('img/'.$name_img->image)){
            unlink('img/'.$name_img->image);
        }
        Employee::findOrFail($id)->delete();
        return redirect()->route('employee.index')->with('success', "Delete Employee Successfully!");

    }
    //show list search employee
    public function show($id)
    {
        $employees = Employee::findOrFail($id);
        return view('read', ['employee' => $employees]);
    }
}