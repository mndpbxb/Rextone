<?php

namespace Mandeep\Profile\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use RainLab\User\Components\Account;
use RainLab\User\Facades\Auth;
use System\Models\File;

class Register extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Register',
            'description' => 'Extended Registration component '
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    
    function onRegisterr()
    {
        try {
            $file = new File();
            $file->data = Input::file('avatar');
            $file->is_public = true;
            $file->save();

            $account = new Account();
            $account->onRegister();
            
            $user = Auth::getUser();
            $user -> avatar() -> add($file);
           
            return Redirect::to('/');
        } catch (\Exception $ex) {
            return $ex;
        }
    }
}



// *********************Trying Image Input***************************** 


//         return $user;
//         $user->avatar()->add($file);
//         return $user;
//         $user = new User();
//         $user->avatar = Input::file('avatar');
//         $account = new Account();
//         $account->onRegister();
//         $file = new File();
//         $file->data = Input::file('avatar');
//         $file->is_public = true;
//         $file->save();
//         $file = new File();
//         $file->data = Input::file('avatar');
//         $file->is_public = true;
//         $file->save();
//         $account->avatar()->add($file);
//         $uploaded_avatar = $account->avatar = Input::file('avatar');
//         $account->save();
//         $uploaded_avatar = $user->avatar = Input::file('avatar');
//         dd($uploaded_avatar);
//         return $user;
//         return $account->onRegister();
//         $date = new DateTime();
//         dd(Input::file('avatar'));
//         $originalName = Input::file('avatar')->getClientOriginalName();
//         $file = Input::file('avatar')->move('/Storage/App/Profile', $originalName.' '.$date);
