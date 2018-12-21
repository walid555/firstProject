<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Admin;
use App\FileData;
use DB;
use Session;
session_start();

class adminController extends Controller
{
    public function login()
    {
    	return view('admin.login');
    }
    public function signUp()
    {
        return view('admin.signUp');
    }
    public function adminHome()
    {
        $this->AdminAuthCheck();
        $allFiles=FileData::all();
    	return view('admin.home')->with('allFiles',$allFiles);
    }
    public function saveAdmin(Request $request)
    {
    	$this->AdminAuthCheck();
        $adminData=new Admin();
    	$adminData->adminName=$request->userName;
    	$adminData->adminEmail=$request->email;
    	$adminData->adminPassword=$request->password;
    	$admin_pass=$request->password;
    	$admin_rpass=$request->repeatPassword;
    	$admin_email=$request->email;
    	$user_email=$request->userEmail;
    	$user_pass=$request->pass;
    	if ($admin_pass==$admin_rpass) {
    		$adminData->save();
    		return Redirect::to('login');
    	}
    	else
    	   {
             Session::put('message','Password invalid');
              return Redirect::to('signUp');
    	   }
    	
    }
    public function showAdmin(Request $request)
    {
    	$user_email=$request->userEmail;
    	$user_pass=$request->pass;
    	$result=DB::table('admin')
    	        ->where('adminEmail',$user_email)
    	        ->where('adminPassword',$user_pass)->first();
    	        if($result)
    	        {
                  Session::put('adminName',$result->adminName);
                  Session::put('adminId',$result->adminId);
                  return Redirect::to('adminHome');
    	        }
    	        else
    	        {
                  Session::put('message','Email or Password invalid');
                  return Redirect::to('login');
    	        }
    }
    public function personalHome($adminId)
    {
    	$adminInfo=Admin::where('adminId',$adminId)->first();
        return view('admin.personalHome')->with('adminInfo',$adminInfo);
   
    }
    public function updateAdmin(Request $request , $adminId)
    {
        $adminUpdate=Admin::find($adminId);
        $adminUpdate->adminName=$request->newName;
        $adminUpdate->adminEmail=$request->newEmail;
        $adminUpdate->adminPassword=$request->newPassword;
        $adminUpdate->save();
        Session::put('message','Admin updated successfully');
        return Redirect::to('adminHome');
    }
    public function logout()
    {
    	Session::flush();
         return Redirect::to('lohin');
    }
    public function AdminAuthCheck()
    {
        $adminId=Session::get('adminId');
        if ($adminId) {
            return;
        }
        else
        {
           return Redirect::to('login')->send(); 
        }
    }
}
