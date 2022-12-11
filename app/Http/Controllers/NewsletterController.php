<?php

namespace App\Http\Controllers;

//use App\Services\Newsletter;

use App\Models\Post;
use MailchimpMarketing\ApiClient;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{

    // public function subscribe(string $email)
    public function __invoke()
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
            'email_address' => request('email'),
            'status' => 'subscribed'
            ]);
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'Questa email non può essere aggiunta alla newsletter!'
                ])->redirectTo('/#newsletter');
        }

        return redirect('/')->with('success', 'Sei iscritto alla nostra newsletter!');

    }

    public function send() //(Post $post)
    {

    // $campaign = $mailchimp->campaigns->create('regular',[
    //     'list_id'=>$list_id,
    //     'subject'=>'Welcome Mail',
    //     'from_email'=>'noreply@devrohit.com',
    //     'from_name'=>'Devrohit',
    //     'to_name'=>'Devrohit Subscriber',		
    // ],[
    //     'html'=> $request->input('body'),
    //     'text'=>strip_tags($request->input('body'))
    // ]);

    // $mailchimp->campaigns->send($campaign['id']);

    // dd('Campaign send successfully.');

    }

}
