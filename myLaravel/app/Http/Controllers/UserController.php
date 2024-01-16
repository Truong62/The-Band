<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('user.login'); 
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'nameUser' => 'required',
            'password' => 'required',
        ]);
    
        $user = User::where('nameUser', $data['nameUser'])->first();
    
        if ($user && ($data['password'] == $user->password)) {
            return redirect()->route('students');
        } else {
            return redirect('/login')->with('error', 'fuck you');
        }
    }
}
