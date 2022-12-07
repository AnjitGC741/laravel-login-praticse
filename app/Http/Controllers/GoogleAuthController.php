<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle()
    {
        try{
            $google_user = Socialite::driver('google')->user();
            $user = User::where('email',$google_user->getEmail())->first();
            if(!$user){
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id'=>$google_user->getId()
                ]);
                Auth::login($new_user);
                return view('dashboard');
            }
            else
            {
                Auth::login($user);
                return view('dashboard',['SN'=> 1]);
            }
        }catch(\Throwable $th)
        {
            dd("something went wrong!". $th->getMessage());
        }
    }
}
