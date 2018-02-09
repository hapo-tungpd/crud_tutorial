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


class CreatesController extends Controller
{
    public function home()
    {
    	$employees = Employee::all();
    	return view('home', ['employees' => $employees]);
    }
    public function create()
    {
    	return view('create');
    }
    public function add(Request $request)
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
    	return redirect('/')->with('info', 'Employee Save Successfully!');
    }
    public function update($id)
    {
    	$employees = Employee::find($id);
    	return view('update', ['employees' => $employees]);
    }
    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required|integer',
            'sex' => 'required',
            'phonenumber' => 'required|numeric',
            'skill' => 'required',
        ], [
            //notification
        ]);
        $employees = Employee::find($id);
        if($request->hasFile('avata')) {
            $file1 = $employees->image;
            File::delete('img/' . $file1);
            $file = $request->avata;
            $file->move('img', $file->getClientOriginalName());
            $employees->image = $file->getClientOriginalName();
            $employees->save();
        }
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
    	return redirect('/')->with('info', 'Employee Update Successfully!');
    }
    public function read(Request $request, $id)
    {
    	$employees = Employee::find($id);
    	return view('read', ['employees' => $employees]);
    }
    public function delete($id)
    {
    	Employee::where('id', $id)
    	->delete();
    	return redirect('/')->with('info', 'Employee Delete Successfully!');
    }
    public function search(Request $request)
    {
        $Search = $request->search_code; //get data from FORM
        $employees = DB::table('employees')->where('name', 'like', "$Search")->paginate(10);
        return view('search', compact('employees', 'Search'));
    }
}
