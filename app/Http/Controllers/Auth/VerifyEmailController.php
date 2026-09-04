<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    /**
     * Display the verification notice view.
     */
    public function notice()
    {
        return view('auth.verify-email');
    }

    /**
     * Verify the email address.
     */
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Email verificado correctamente.');
    }

    /**
     * Send the email verification notification.
     */
    public function sendNotification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return redirect()
            ->route('verification.notice')
            ->with('success', 'Se ha reenviado el email de confirmación.');
    }
}
