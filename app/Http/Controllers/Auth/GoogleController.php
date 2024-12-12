<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function handleGoogleCallback()
    {
        try {
            // Get user data from Google
            $googleUser = Socialite::driver('google')->stateless()->user();
    
            // Check if the user already exists with Google ID
            $user = User::where('google_id', $googleUser->getId())->first();
    
            // If user doesn't exist, create a new one
            if (!$user) {
                $user = User::where('email', $googleUser->getEmail())->first();
    
                // If no user found with that email, create a new one
                if (!$user) {
                    $user = User::create([
                        'name' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'google_id' => $googleUser->getId(),
                        'password' => bcrypt(12345678), // Random password, as we don't need it
                    ]);
                }
            }
    
            // Log the user in
            Auth::login($user, true);
    
            // Redirect to intended page or default to home
            return redirect()->intended('/home');
        } catch (\Exception $e) {
            // Log the exception or handle the error
            \Log::error('Google OAuth Error: ' . $e->getMessage());
            
            return redirect()->route('website.login')->withErrors('Unable to authenticate with Google. Please try again.');
        }
    }
}    