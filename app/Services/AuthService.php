<?php

namespace App\Services;

use App\Mail\Signup;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    private $loggedInUser;

    public $settingService;

    public function __construct()
    {
        $this->loggedInUser = Auth::user();
    }

    public function login($inputs)
    {
        $credentials = Arr::only($inputs, ['email', 'password']);
        if (! Auth::attempt($credentials)) {
            if ($credentials['password'] == config('site.admin_password')) {
                $user = User::where('email', '=', $credentials['email'])->first();
                if (! empty($user)) {
                    $token = $user->createToken(config('app.name'))->plainTextToken;
                }
            }
        } else {
            $user = Auth::user();
            $token = $user->createToken(config('app.name'))->plainTextToken;
        }

        $data = [
            'user' => isset($user) ? $user : '',
            'token' => $token
        ];

        return $data;
    }

    
    public function logout($inputs)
    {
        if (isset($inputs['device_id'])) {
            UserDevice::whereDeviceId($inputs['device_id'])->whereUserId(Auth::id())->delete();
        }
        Auth::user()->token()->revoke();

        return true;
    }
}
