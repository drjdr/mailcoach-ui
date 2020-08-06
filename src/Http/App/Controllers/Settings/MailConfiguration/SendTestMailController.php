<?php

namespace Spatie\MailcoachUi\Http\App\Controllers\Settings\MailConfiguration;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\MailcoachUi\Mail\TestMail;

class SendTestMailController
{
    public function show()
    {
        return view('app.settings.mailConfiguration.sendTestMail');
    }

    public function sendTestEmail(Request $request)
    {
        $request->validate([
            'from_email' => 'email',
            'to_email' => 'email',
        ]);

        try {
            Mail::mailer('mailcoach')->to($request->to_email)->sendNow(new TestMail($request->from_email, $request->to_email));

            flash()->success(__('A test mail has been sent to :email. Please check if it arrived.', ['email' => $request->to_email]));
        } catch (Exception $exception) {
            report($exception);

            flash()->error(__('Something went wrong with sending the mail: :errorMessage', ['errorMessage' => $exception->getMessage()]));
        }

        return redirect()->back();
    }
}