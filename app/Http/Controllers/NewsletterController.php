<?php

namespace App\Http\Controllers;

//use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{

    public function __construct()
    {
        
    }

    public function subscribe(string $email)
    {
        request()->validate(['email' => 'required|email']);

        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us13'
        ]);
        
        $list_id = config('services.mailchimp.list_id');
    
        try {
            $mailchimp->lists->addListMember($list_id, [
            'email_address' => $email,
            'status' => 'subscribed'
            ]);
        } catch (\Exception $e) {
        throw ValidationException::withMessages([
            'email' => 'Questa email non può essere aggiunta alla newsletter!'
            ])->redirectTo('/#newsletter');
        }

        return redirect('/')->with('success', 'Sei iscritto alla nostra newsletter!');

    }

}
