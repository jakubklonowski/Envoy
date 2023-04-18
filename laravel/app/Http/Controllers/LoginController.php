<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // returns login&register form
    public function index() {
        return view('login.index');
    }

    // log in
    public function store(Request $request) {
        $login = $request->input('login');
        $password = $request->input('password');

        $user = DB::table('users')->where('login', $login)->first();

        if ($user === null || !Hash::check($password, $user->password)) {
            return redirect('/login');
        }
        else {
            session(['login' => $login]);
            if ($user->admin === 1) {
                session(['admin' => true]);
            }
            else if ($user->admin === 0) {
                session(['admin' => false]);
            }
            return redirect('/account');
        }
    }

    // log out
    public function destroy() {
        session()->flush();
        return redirect('/');
    }
}
