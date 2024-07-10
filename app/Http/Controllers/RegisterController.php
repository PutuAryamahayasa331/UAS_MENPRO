<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Validator;
use Illuminate\Http\RedirectResponse;


class RegisterController extends Controller
{
    public function signup_member()
    {
        return view('guest.signup_mem', [
            'title' => 'HandyHelp | Sign up as Member',
        ]);
    }

    public function signup_contractor()
    {
        return view('guest.signup_con', [
            'title' => 'HandyHelp | Sign up as Contractor',
        ]);
    }

    public function store_member(Request $request)
    {
        $request->validate([
            'name' => 'required| string|min:5| max:255',
            'username' => 'required| string|min:5| max:255| unique:users',
            'phone' => 'required| numeric| min_digits:8| max_digits:15 |unique:users',
            'email' => 'required | string| email | max:255| unique:users',
            'password' => 'required| same:confirm_password',
            'confirm_password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => 'member',
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect('/login')->with('success', 'Your Account has been created successfully! Please Login');
    }

    public function store_contractor(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'username' => 'required| string|min:5| max:255| unique:users',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'min_digits:8', 'max_digits:15', 'unique:users'],
            'identity' => ['required', 'numeric', 'min_digits:10', 'max_digits:20', 'unique:users'],
            'password' => ['required', 'same:confirm_password'],
            'confirm_password' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => 'contractor',
            'email' => $request->email,
            'phone' => $request->phone,
            'identity' => $request->identity,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect('/login')->with('success', 'Your Account has been created successfully! Please Login');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
