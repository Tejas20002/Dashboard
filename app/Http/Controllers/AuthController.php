<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = request(['email', 'password']);
        $credentials['role'] = 1;
        $credentials['deleted_at'] = null;

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid login credentials. Please try again'
            ], 401);
        }

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(52);
        $token->save();

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'auth_type' => 'email',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
        ], 206);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('login');
    }

    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function user(Request $request) {
        return response()->json($request->user());
    }

    public function loginWithGoogle() {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect('welcome');
            }else{
                //user is not yet created, so create first
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('')
                ]);
                Auth::login($newUser);
                return redirect('welcome');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
