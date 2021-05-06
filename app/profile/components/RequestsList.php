<?php

namespace Mandeep\Profile\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use RainLab\User\Facades\Auth;
use System\Models\File;

class RequestsList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Requests List',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    function onUpload()
    {

        $file = new File();
        $file->data = Input::file('avatar');
        $file->is_public = true;
        $file->save();
        // return Response::json(Input::file('avatar')->getClientOriginalName());

        $user = Auth::getUser();
        $user -> avatar() -> add($file);
        return Response::json($user);

        
    }
}



// ************************Test Code**************************** 
        // $user = Auth::getUser()->first();
        // $file = new File();
        // $avatar = $user->avatar(Input::file('avatar'));
        // if(Input::hasFile('avatar')){
        //     dd('Uploaded');
        // }
        // else{
        //     dd('Not Uploaded');
        // }


        // dd(Input::file('avatar')->getClientOriginalName());
        // $uploaded_avatar = $user->avatar = Input::file('avatar');
        // dd($uploaded_avatar);
        // return $account->onRegister();
        // $date = new DateTime();
        // dd(Input::file('avatar'));
        // $originalName = Input::file('avatar')->getClientOriginalName();
        // $file = Input::file('avatar')->move('/Storage/App/Profile', $originalName.' '.$date);
