<?php

namespace Mandeep\Profile\Components;

use Cms\Classes\ComponentBase;
use RainLab\User\Facades\Auth;
use RainLab\User\Models\User;

class DonorList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Donor List',
            'description' => 'Displays a List of available Donors'
        ];
    }

    public function defineProperties()
    {
        return [
            'maxDonors' => [
                'title'             => 'Max Donors',
                'description'       => 'The most amount of donors to be displayed',
                'default'           => 0,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'The Max Donors property can contain only numeric symbols'
            ]
        ];
    }

    public function onRun()
    {
        $this->donors = $this->getDonors();
        $user = Auth::getUser();
    }

    public function getDonors()
    {
        $donors = User::where('user_role', 'Donor')->get();
        if ($this->property('maxDonors') > 0) {
            return ($donors->take($this->property('maxDonors')));
        } else {
            return $donors;
        }
    }
}
