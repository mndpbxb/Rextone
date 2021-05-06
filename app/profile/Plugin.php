<?php

namespace Mandeep\Profile;

use System\Classes\PluginBase;
use RainLab\User\Controllers\Users as UsersController;
use RainLab\User\Models\User as UserModel;

use function PHPSTORM_META\type;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Mandeep\Profile\Components\DetailedRegistration' => 'detailed_registration',
            'Mandeep\Profile\Components\DonorList' => 'Donors',
            'Mandeep\Profile\Components\ReceiversList' => 'Receivers',
            'Mandeep\Profile\Components\RequestsList' => 'Requests',
            'Mandeep\Profile\Components\SignIn' => 'SignIn',
            'Mandeep\Profile\Components\Register' => 'Register',

        ];
    }

    public function registerSettings()
    {
    }


    public function boot()
    {
        UserModel::extend(function ($model) {
            $model->addFillable([
                'date_of_birth',
                'address',
                'phone',
                'profession',
                'user_role',
                'confidential',

            ]);

            $model->hasOne['requests'] = ['Mandeep\Donation\Models\Request', 'key' => 'requester_id', 'other_key' => 'id'];
            $model->hasMany['donor_transaction'] = ['Mandeep\Donation\Models\Transaction', 'key' => 'donor_id', 'other_key' => 'id'];
            $model->hasMany['requester_transaction'] = ['Mandeep\Donation\Models\Transaction', 'key' => 'receiver_id', 'other_key' => 'id'];
            $model->attachOne['avatar'] = ['System\Models\File'];
        });

        UsersController::extendFormFields(function ($form, $model, $context) {
            $form->addTabFields([
                'date_of_birth' => [
                    'label' => 'Date of Birth',
                    'type' => 'datepicker',
                    'tab' => 'Profile'
                ],
                'address' => [
                    'label' => 'Address',
                    'type' => 'text',
                    'tab' => 'Profile'
                ],
                'phone' => [
                    'label' => 'Phone',
                    'type' => 'number',
                    'tab' => 'Profile'
                ],
                'profession' => [
                    'label' => 'Profession',
                    'type' => 'text',
                    'tab' => 'Profile'
                ],
                'user_role' => [
                    'label' => 'User Role',
                    'type' => 'text',
                    'tab' => 'Profile'
                ],
                'confidential' => [
                    'label' => 'Confidential',
                    'type' => 'text',
                    'tab' => 'Profile'
                ]
            ]);
        });

        UsersController::extendListColumns(function ($list, $model) {
            if (!$model instanceof UserModel)
                return;

            $list->addColumns([
                'date_of_birth' => [
                    'label' => 'Date of Birth',
                ],
                'address' => [
                    'label' => 'Address',
                ],
                'phone' => [
                    'label' => 'Phone',
                ],
                'profession' => [
                    'label' => 'Profession',
                ],
                'user_role' => [
                    'label' => 'User Role',
                ],
                'confidential' => [
                    'label' => 'Confidential',
                ],
            ]);
        });
    }
}
