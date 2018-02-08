<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Employee;
use Illuminate\Http\Request;

class UploadController extends Controller
{
   public function upload(Request $request){
      if (Input::hasFile('file')) {
         echo 'Uploaded<br/>';
         $file=Input::file('file');
         $file->move('uploads', $file->getClientOriginalName());
         echo '<img src="uploads/' . $file->getClientOriginalName() . '" />';
      }

      // $employees = new Employee;
      // $employees->avatar = $request->input('avatar');
}
