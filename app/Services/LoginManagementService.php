<?php
/**
 * Created by IntelliJ IDEA.
 * User: jeffr
 * Date: 21-11-2017
 * Time: 08:46
 */

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class LoginManagementService
{
    public function getUser($email) {
        Log::info('In::getUser '.$email);
        $user = User::where('email',$email)->first();
        Log::info(($user));
        if($user) {
            Log::info('User Found');
        } else {
            Log::info('User not Found');
        }
        return $user;
    }
}