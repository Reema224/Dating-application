<?php

use Illuminate\Passwords\PasswordBrokerManager;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected function broker()
    {
        return app(PasswordBrokerManager::class)->broker('users');
    }
}
