<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function index()
    {
        $mainCategory = MainCategory::with('subcategories')->get();
        return view('auth.login', compact('mainCategory'));
    }

    public function login(LoginRequest $request)
    {
        $confidential = $request->only('email', 'password');
        try {
            if (Auth::attempt($confidential)) {
                $user = Auth()->user();
                Session::put('user_id', $user->id);
                return redirect('/')->with('success', 'Welcome ' . $user->name);
            } else {
                return back()->with('error', 'Incorrect email or password!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/')->with('success', 'You have logout successfully!');
    }
}
