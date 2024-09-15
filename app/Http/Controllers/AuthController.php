<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Employee;


class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('authentication.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'Your credientials are not matched.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function apilogin(Request $request)
{
    // Validate the request
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Attempt to find the user by email
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        // Return a user not found response
        return response()->json([
            'error' => 'User not found',
        ], 404);
    }

    // Check if password matches
    if (!Hash::check($request->password, $user->password)) {
        // Return password mismatch error
        return response()->json([
            'error' => 'Password mismatch',
        ], 401);
    }

    // Retrieve employee details
    $employee = Employee::where('user_id', $user->id)->first();

    if (!$employee) {
        return response()->json([
            'error' => 'Employee not found',
        ], 404);
    }

    // Return successful login response with api_token, user_id, and company_id
    return response()->json([
        'api_token' => $user->api_token,
        'user_id' => $employee->user_id,
        'company_id' => $employee->company_id,
    ], 200);
}


    
}
