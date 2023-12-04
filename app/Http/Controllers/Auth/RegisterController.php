<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerProcess(Request $request){
        $newUser = new User();
        $newUser->name = $request->input('name');
        $newUser->email = $request->input('email');
        $newUser->role = $request->input('role');
        $newUser->password = Hash::make($request->input('password'));
        $newUser->save();

        return view('auth.login');
    }
}
