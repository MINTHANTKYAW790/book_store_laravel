<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Password; // Add this line

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $user = \App\Models\User::where('email', $request->email)->first();
        if ($user && $user->deleted) {
            return back()->withErrors(['email' => 'This account has been deleted.']);
        }

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }
}
