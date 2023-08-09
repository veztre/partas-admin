<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

    }

    public function getUser(Request $request)
    {

        $user=User::select("*")
         ->where('email',$request->email)
         ->get();
         return response()->json($user);

    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return Auth::user();
        }else{
            return response()->json(null);
        }
    }

    public function saveUser(Request $user){
        $user = User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => Hash::make($user['password']),
            'phone' =>  $user['phone']

        ]);
        return response()->json($user);
    }

}
