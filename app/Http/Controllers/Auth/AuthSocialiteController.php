<?php

namespace App\Http\Controllers\Auth;

use App\Provider;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class AuthSocialiteController extends Controller
{
    /**
     * Redirect the user to the provider authentication page.
     *
     * @return \Illuminate\Http\Response
     */
   public function redirectToProvider($provider)
   {
       return Socialite::driver($provider)->redirect();
   }

   /**
    * Obtain the user information from the provider
    *
    * @return Response
    */
   public function handleProviderCallback($provider)
   {
       $user = Socialite::driver($provider)->user();

       $selectProvider = Provider::where('provider_id', $user->getId())->first();

       if(!$selectProvider)
       {
           // New user
           $userGetReal = User::where('eamil', $user->getEmail())->first();
           if(!$userGetReal)
           {
               $userGetReal = new User();
               $userGetReal->name = $user->getName();
               $userGetReal->email = $user->getEmail();
               $userGetReal->avatar = $user->getAvatar();
               $userGetReal->save();
           }

           $newProvider = new Provider();
           $newProvider->provider_id = $user->getId();
           $newProvider->provider = $provider;
           $newProvider->user_id = $userGetReal->id;
           $newProvider->save();


       }else {
           // Login user
           $userGetReal = User::findOrFail($selectProvider->user_id);
       }

       auth()->login($userGetReal);
       return redirect()->route('landing-page');
   }
}
