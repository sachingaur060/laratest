<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    /*
    * login Admin
    */
     public function login(Request $request){

        $validator = \Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
           
            return \Redirect::back()->withErrors($validator)->withInput();
        }

        $input = $request->all();
            //Using laravel default auth 
         if( \Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'Admin']) ) {

            return \Redirect::route('admin.dash');

         }else{
            return \Redirect::back()->with(['errors' => 'Invalid Credentials']);
         }
     }


     //Register

     public function Register(Request $request){

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
           
            return \Redirect::back()->withErrors($validator)->withInput();
        }
        $input= $request->all();
        $input['role'] = 'user';
        $input['password']  = Hash::make($input['password']);
        $user = \App\User::create($input);
        return \Redirect::back()->with(['message' => 'Added user']);
    }


     //User List

     public function UserList(Request $request){

        $users = \App\User::all();

        return view('admin.userlist',compact('users'));
    }



      //User Update

      public function Store(Request $request,$id){

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
           
            return \Redirect::back()->withErrors($validator)->withInput();
        }

        $User=\App\User::Find($id);
        $User->name = !empty($request->name) ? $request->name: $User->name; 
        $User->email =  !empty($request->password) ? $request->password: $User->password; 
        $user->save();

        return view('admin.userlist',compact('users'))>with(['message' => 'Updated successfully']);
    }



}
