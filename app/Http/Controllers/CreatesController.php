<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;

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
    	// return 'add';
    	$this->validate($request, [
    		'name' => 'required',
    		'age' => 'required',
    		'sex' => 'required',
    		'email' => 'required',
    		'phonenumber' => 'required',
    		'skill' => 'required'
    		// 'test1' => 'required',
    		// 'description' => 'required'
    	]);

    	$employees = new Employee;
    	$employees->name = $request->input('name');
    	$employees->age = $request->input('age');
    	$employees->sex = $request->input('sex');
    	$employees->email = $request->input('email');
    	$employees->phonenumber = $request->input('phonenumber');
    	$employees->skill = $request->input('skill');
    	// $employees->test1 = $request->input('tes1');
    	// $employees->description = $request->input('description');
    	$employees->save();
    	return redirect('/')->with('info', 'Employee Save Successfully!');
    }

    public function update($id){
    	$employees = Employee::find($id);
    	return view('update', ['employees' => $employees]);
    }

    public function edit(Request $request, $id){
    	// return $id;
    	$this->validate($request, [
    		'name' => 'required',
    		'age' => 'required',
    		'sex' => 'required',
    		'email' => 'required',
    		'phonenumber' => 'required',
    		'skill' => 'required'
    		// 'test1' => 'test1',
    		// 'description' => 'required'
    	]);
    	$data = array (
    		'name' => $request->input('name'),
    		'age' => $request->input('age'),
    		'sex' => $request->input('sex'),
    		'email' => $request->input('email'),
    		'phonenumber' => $request->input('phonenumber'),
    		'skill' => $request->input('skill')
    		// 'test1' => $request->input('test1'),
    		// 'description' => $request->input('description')
    	);
    	Employee::where('id', $id)
    	->update($data);
    	$employees = new Employee;
    	return redirect('/')->with('info', 'Employee Update Successfully!');
    }

    public function read($id){
    	// return $id;
    	$employees = Employee::find($id);
    	return view('read', ['employees' => $employees]);
    }

    public function delete($id){
    	Employee::where('id', $id)
    	->delete();
    	return redirect('/')->with('info', 'Employee Delete Successfully!');
    }
    
   //  public function search(Request $request){
   //  	$category = $request->input('category');
   //  	// $employees = Employee::with('services', function($query) use ($category){
   //  	// 	$query->where('category', 'LIKE', '%' . $category . '%');
   //  	// })->get();
   //  	$employees = Employee::where('name', 'like', '%'.$category.'%');
			// // ->orderBy('name')
			// // ->paginate(20);
    
			// return view('search',compact('employees'))->withuser($employees);
			// // return 'aaaaa';
    
   //  }

    public function search(Request $request){
    	$Search=$request->search_code; //get data from FORM
    	$employees = DB::table('employees')->where('name', 'like', "$Search")->paginate(10);
    	return view('search', compact('employees', 'Search'));
    }
}
