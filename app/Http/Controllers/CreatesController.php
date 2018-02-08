<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Input;
use Image;

class CreatesController extends Controller
{
    public function home(){
    	$employees = Employee::all();
    	return view('home', ['employees' => $employees]);
    }
    public function create(){
    	return view('create');
    }
    public function add(Request $request){
    	$request->validate([
    		'name' => 'required',
    		'age' => 'required|integer',
    		'sex' => 'required',
    		'email' => 'required|email|unique:employees',
    		'phonenumber' => 'required|numeric',
    		'skill' => 'required',
    	]);

    	// $validator = Validator::make($request->all(), [
     //        'email' => '',
     //    ]);

     //    if ($validator->fails()) {
     //        return redirect('/update')
     //          ->withErrors($validator)
     //          ->withInput();
     //    }
    	
    	$employees = new Employee;
    	$employees->name = $request->input('name');
    	$employees->age = $request->input('age');
    	$employees->sex = $request->input('sex');
    	$employees->email = $request->input('email');
    	$employees->phonenumber = $request->input('phonenumber');
    	$employees->skill = $request->input('skill');
    	$employees->save();
    	return redirect('/')->with('info', 'Employee Save Successfully!');
    }
    public function update($id){
    	$employees = Employee::find($id);
    	return view('update', ['employees' => $employees]);
    }
    public function edit(Request $request, $id){
    	// return $id;
    	$request->validate([
    		'name' => 'required',
    		'age' => 'required|integer',
    		'sex' => 'required',
    		'email' => 'required|email|unique:employees',
    		'phonenumber' => 'required|numeric',
    		'skill' => 'required',
    	]);
    	$data = array (
    		'name' => $request->input('name'),
    		'age' => $request->input('age'),
    		'sex' => $request->input('sex'),
    		'email' => $request->input('email'),
    		'phonenumber' => $request->input('phonenumber'),
    		'skill' => $request->input('skill'),
    	);
    	Employee::where('id', $id)
    	->update($data);
    	$employees = new Employee;
    	return redirect('/')->with('info', 'Employee Update Successfully!');
    }
    public function read(Request $request, $id){
    	// return $id;
    	$employees = Employee::find($id);
    	return view('read', ['employees' => $employees]);
    }
    public function delete($id){
    	Employee::where('id', $id)
    	->delete();
    	return redirect('/')->with('info', 'Employee Delete Successfully!');
    }
}
