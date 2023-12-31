<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Contracts\Service\Attribute\Required;

class sessionController extends Controller
{
    function index() {
        return view('login');
    }
    function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email Wajib Di Isi',
            'password.required' => 'Password Wajib Di Isi',
        ]);

        $authLogin = [
            'email'=> $request->email,
            'password'=> $request->password
        ];
        if (Auth::attempt($authLogin)){
            // return redirect()->route('admin');
            $request->session()->regenerate();

            $userRole = Auth::user()->role;

            if ($userRole == 'user') {
                return redirect()->route('user');
            } elseif ($userRole == 'admin') {
                return redirect()->route('admin');
            }
        }else{
            return redirect('login')->withErrors(['loginError' => 'Email atau Password Salah']);
        }
    }

    function registerIndex() {
        return view('register');
    }

    function register(Request $request) {
        Session::flash('name',$request->name);
        Session::flash('email',$request->email);
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ],[
            'name.required' => 'Nama Wajib Di Isi',
            'email.required' => 'Email Wajib Di Isi',
            'email.unique' => 'Email Sudah Pernah Di Gunakan',
            'password.required' => 'Password Wajib Di Isi',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        $data = [
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ];
        
        User::create($data);

        $authLogin = [
            'email'=> $request->email,
            'password'=> $request->password
        ];
        if (Auth::attempt($authLogin)){
            $userRole = Auth::user()->role;
            if ($userRole == 'user') {
                return redirect()->route('user');
            } elseif ($userRole == 'admin') {
                return redirect()->route('admin');
            }
        }else{
            return redirect('login')->withErrors('Email Atau Password Salah');
        }
    }

    function logout() {
        Auth::logout();
        return redirect()->route('index');
    }
}
