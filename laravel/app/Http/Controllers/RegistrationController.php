<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    // creates account
    public function store(Request $request) {
        $this->validate(request(), [
            'login' => 'required|unique:users,login',
            'password0' => 'required',
            'password1' => 'same:password0'
        ]);

        $login = $request->input('login');
        $password = $request->input('password0');
        // $repeatPassword = $request->input('password1');
        
        $hash = Hash::make($password);

        DB::table('users')->insert([
            'login' => $login,
            'password' => $hash,
            'admin' => 0,
            'active' => 0
        ]);

        return redirect('/login');
    }

    // deletes account
    public function destroy(Request $request) {
        $login = session('login');
        $password = $request->input('password');

        $user = DB::table('users')->where('login', $login)->first();
        if (Hash::check($password, $user->password)) {
            DB::table('users')->where('login', $login)->delete();
        }

        return redirect('/login');
    }
}
