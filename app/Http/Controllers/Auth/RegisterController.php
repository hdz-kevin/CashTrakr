<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display the registration form.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a new user in the database.
     */
    public function store(RegisterRequest $request)
    {
        $data = $request->validated();

        User::create($data);

        return "You are registered successfully";
    }
}
