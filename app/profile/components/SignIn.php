<?php

namespace Mandeep\Profile\Components;

use Cms\Classes\ComponentBase;
use Exception;
use Illuminate\Contracts\Logging\Log;
use RainLab\User\Components\Account;

class SignIn extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SignIn',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    function onSigninn()
    {
        try {
            $account = new Account();
            return $account->onSignin();
        } catch (Exception $ex) {
            Log::error($ex);
        }
    }
}
