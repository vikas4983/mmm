<?php
namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait LoginUserTrait{

    public function loginUser(){
       $user =   Auth::user();
       if(!$user){
          return redirect()->back()->with('error', 'Login First!');
       }
       return $user;
    }
}




