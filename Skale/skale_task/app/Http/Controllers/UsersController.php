<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersModel;

class UsersController extends Controller
{
    public function get_users(){
        $users = UsersModel::all();
        return $users;
        // return view('get_users')->with('all_users', $users);
    }

    public function get_user_by_id($u_id){

        $user = UsersModel::get_user_by_id($u_id);
        return $user;
    }
}
