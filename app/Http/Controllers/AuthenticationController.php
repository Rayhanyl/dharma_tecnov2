<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function showLoginPage()
    {
        return view('auth.login');
    }
    public function showRegisterPage()
    {
        return view('auth.register');
    }

    public function storeLoginProcess(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            $request->session()->put([
                'email' => Auth::user()->email,
                'name'  => Auth::user()->first_name . Auth::user()->last_name,
                'phone' => Auth::user()->phone_number,
                'role'  => Auth::user()->role,
            ]);
            Alert::toast('Berhasil login', 'success');
            if (session('role') === 'admin') {
                return redirect()->route('admin.index.page');
            }elseif (session('role') === 'general') {
                return redirect()->route('general.index.page');
            }elseif (session('role') === 'recruiter') {
                return redirect()->route('recruiter.index.page');
            }else{
                return redirect()->route('applicant.index.page');
            }
        } else {
            Alert::toast('Email & Password Doesnt match in our database', 'warning');
            return redirect()->back()->with('error', "Email & Password Doesn't match in our database");
        }
    }

    public function storeRegisterProcess(Request $request)
    {
        // Validation rules
        $rules = [
            'password' => 'required|min:6|confirmed',
        ];

        // Validation messages
        $messages = [
            'password.confirmed' => 'The password confirmation does not match.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);
        // Check for validation failure
        if ($validator->fails()) {
            Alert::toast('Error', 'warning');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'first_name' => $request->nama_depan,
                'last_name' => $request->nama_belakang,
                'phone_number' => '+62' . $request->phone,
                'role' => 'applicant',
            ]);
            Alert::toast('Berhasil membuat akun', 'success');
            return redirect()->route('auth.login.page');
        } catch (\Throwable $e) {
            Alert::warning('Error', 'Contact Developer to Fix This');
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::toast('Berhasil logout', 'success');
        return redirect()->route('auth.login.page');
    }
}
