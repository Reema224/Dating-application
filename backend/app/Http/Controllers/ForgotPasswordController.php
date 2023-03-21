<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        if ($response == Password::RESET_LINK_SENT) {
            return response()->json(['status' => 'success']);
        } else {
            throw ValidationException::withMessages([
                'email' => [trans($response)],
            ]);
        }
    }

    protected function credentials(Request $request)
    {
        return $request->only('email');
    }
}

