<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Login Methods
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input("username");
        $password = $request->input("password");
        
        // Find user by username
        $user = User::where('name', $username)->first();
        
        if($user && Hash::check($password, $user->password)){
            // Login successful
            Auth::login($user);
            return redirect()->route("age.form");
        } else {
            return redirect()->back()->with("msg", "Đăng nhập thất bại");
        }
    }

    // Register Methods
    public function SignIn()
    {
        return view('register');
    }

    public function CheckSignIn(Request $request){
        $username = $request->input("username");
        $password = $request->input("password");
        $repass = $request->input("repass");
        $mssv = $request->input("mssv");
        $lopmonhoc = $request->input("lopmonhoc");
        $gioitinh = $request->input("gioitinh");

        if ($username !== "Minhnh" || $password !== "123abc"
            || $repass !== "123abc" || $mssv !== "0035467"
            || $lopmonhoc !== "67PM2" || $gioitinh !== "Nam") {
            return redirect()->back()->with("msg", "Tên đăng nhập hoặc mật khẩu không đúng yêu cầu");
        }
        
        if($password != $repass){
            return redirect()->back()->with("msg", "Mật khẩu không khớp");
        }
        
        // Check if username already exists
        $existingUser = User::where('name', $username)->first();
        if($existingUser){
            return redirect()->back()->with("msg", "Tên đăng nhập đã tồn tại");
        }
        
        // Create new user
        User::create([
            'name' => $username,
            'email' => $mssv,
            'password' => Hash::make($password),
        ]);
        
        return redirect()->route('login')->with("msg", "Tạo tài khoản thành công. Vui lòng đăng nhập");
    }

    // Logout Method
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}
