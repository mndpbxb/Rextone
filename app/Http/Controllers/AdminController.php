<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function get_admin()
    {
        if(Auth::user()->role == 'admin'){
            return view('roxtone.admin.users-table')->with('users', User::where('role', 'Customer')->get());
        }
        else{
            Session::flash('alert-warning','Please login with Admin Credentials to access the Admin Page');
            return back();
        }
    }

public function delete_customer($id)
{
    User::find($id)->delete();
    Session::flash('alert-success', 'User Deleted Successfully');
    return redirect()->back();
}


public function get_update_customer($id)
{
    return view('roxtone.admin.update-customer')->with('user', User::find($id));
}


public function post_update_customer(Request $req, $id)
{
    User::find($id)
        ->update([
            'name' => $req -> name,
            'email' => $req -> email,
            'address' => $req -> address,
            'phone' => $req -> phone,
            'date_of_birth' => $req -> date_of_birth,


        ]);
    Session::flash('alert-success', 'Updated Successfully');
    return redirect('admin/');
}
}
