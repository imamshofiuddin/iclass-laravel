<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginProcess(Request $request){
        $user = User::where('email','=', $request->input('email'))->first();
        if($user == null){
            return view('auth.login');
        }

        if(Hash::check($request->input('password'), $user->password)){
            $this->setUserSession($user);
            return $this->roleCheck($user);
        } else {
            return view('auth.login');
        }
    }

    public function roleCheck(User $user){
        if($user->role == 'student'){
            return redirect()->route('student.home');
        }
        if($user->role == 'teacher'){
            return redirect()->route('teacher.home');
        }
    }

    public function setUserSession(User $user){
        session(['user_id' => $user->id]);
        session(['user_name' => $user->name]);
        session(['user_role' => $user->role]);
    }

    public function logout(){
        session()->forget('user_id');
        session()->forget('user_name');
        session()->forget('user_role');
        return view('auth.login');
    }
}
