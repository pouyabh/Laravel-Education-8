<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Exception;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        ddd($newsletter);
        request()->validate(['email' => 'email|required']);
        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This Email Could Not added To newlette List'
            ]);
        }
        return redirect('/')->with('success', 'Your Email Signed For News');
    }
}
