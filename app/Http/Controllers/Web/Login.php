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
        $user=DB::table('users')->where('name',$name)->orWhere('tel',$name)->exists();

        return empty($user) ? 0 : 1 ;

    }

    public function tologin(Request $data)
    {
        $this->validate($request,[
            'username'=>'required|max:255',
            'password'=>'required|min:6',
        ]);
        $name=$request->input('username');
        $password=$request->input('password');

        $user=DB::table('users')
            ->where(function($query){

                $query->where('name',$name)->where('password',md5($password));

            })->orWhere(function($query){

                $query->where('tel', $name)->where('password', md5($password));

            })->get();
        return empty($user) ? 0 : 1 ;
    }
}
