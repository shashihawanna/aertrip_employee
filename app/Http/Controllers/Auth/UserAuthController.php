<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed'
            ]);

            $data['password'] = bcrypt($request->password);

            $user = User::create($data);

            $token = $user->createToken('API Token')->accessToken;

            return response(['user' => $user, 'token' => $token]);
        } catch (Exception $e) {
            dd($e);
            Log::error($e);
        }
    }

    public function login(Request $request)
    {
        try {
            $data = $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            if (!auth()->attempt($data)) {
                return response(['error_message' => 'Incorrect Details. 
            Please try again']);
            }

            $token = auth()->user()->createToken('API Token')->accessToken;

            return response(['user' => auth()->user(), 'token' => $token]);
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
