<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display the login form.
     */
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $data = $request->validated();

        if (! Auth::attempt($data, remember:true)) {
            return back()->with('error', 'Credenciales incorrectas')
                         ->withInput($request->only('email'));
        }

        return redirect()->route('dashboard');
    }
}
