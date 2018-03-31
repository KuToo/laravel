<?php

namespace App\Http\Controllers\Web;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class Login extends Controller
{


    public function login()
    {
        return view('login/login');
    }

    public function logout()
    {
        return view('login/login');
    }

    public function checkname(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255',
        ]);
        $name=$request->input('username');
        $user=DB::table('users')->where('name',$name)->orWhere('tel',$name)->first();

        return empty($user) ? 0 : 1 ;

    }
}
