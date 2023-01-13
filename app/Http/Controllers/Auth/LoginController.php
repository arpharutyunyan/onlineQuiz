<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialFacebookAccount;
use App\Providers\RouteServiceProvider;
use http\Message;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Auth;

use Exception;

use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()

    {
//        dd('redirect');
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()

    {


        try {

            $user = Socialite::driver('google')->user();
//            dd($user->id);
            $finduser = User::where('google_id', $user->id)->first();
//            dd($finduser);
            if($finduser){

                Auth::login($finduser);

                return redirect()->route('welcome');

            }else{

                $newUser = User::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    'google_id'=> $user->id

                ]);
//                dd($newUser);
                Auth::login($newUser);

                return redirect()->route('welcome');

            }

        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect('auth/google');

        }

    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {

            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('facebook_provider_user_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->route('welcome');

            }else {

                $newUser = User::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    'facebook_provider_user_id' => $user->id

                ]);
                Auth::login($newUser);

                return redirect()->route('welcome');
            }

        }catch (Exception $e) {
            dd($e->getMessage());
            return redirect('auth/facebook');
        }

    }
}
