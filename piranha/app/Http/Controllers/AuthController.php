<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if ($user = Auth::user()) {
            if ($user->level == 'admin') {
                return redirect()->intended('dashboard');
            } elseif ($user->level == 'user') {
                return redirect()->intended('/');
            }
        }

        return view('login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );

        $kredensil = $request->only('username', 'password');

        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            if ($user->level == 'admin') {
                return redirect()->intended('dashboard');
            } elseif ($user->level == 'user') {
                return redirect()->intended('/');
            }
            return redirect()->intended('/');
        }
        return redirect('loginn')
            ->withInput()
            ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('loginn');
    }

    public function register()
    {
        return view('register');
    }
    public function registerSimpan(Request $request)
    {
        Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'user', 'admin'
        ]);

        return redirect()->route('loginn');
    }
}
