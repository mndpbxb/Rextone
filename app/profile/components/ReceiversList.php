<?php namespace Mandeep\Profile\Components;

use Cms\Classes\ComponentBase;

use RainLab\User\Facades\Auth;
use RainLab\User\Models\User;

class ReceiversList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ReceiversList Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
                'maxReceivers' => [
                    'title'             => 'Max Receivers',
                    'description'       => 'The most amount of Receivers to be displayed',
                    'default'           => 0,
                    'type'              => 'string',
                    'validationPattern' => '^[0-9]+$',
                    'validationMessage' => 'The Max Receivers property can contain only numeric symbols'
                ]
        ];
    }



    public function onRun()
    {
        $this->receivers = $this->getReceivers();
        $user = Auth::getUser();
    }

    public function getReceivers()
    {
        $receivers = User::where('user_role', 'Receiver')->get();
        if ($this->property('maxReceivers') > 0) {
            return ($receivers->take($this->property('maxReceivers')));
        } else {
            return $receivers;
        }
    }
}