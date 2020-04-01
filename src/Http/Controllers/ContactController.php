<?php

namespace Pondit\Contact\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
//use Pondit\Contact\Mail\ContactMailable;
use Pondit\Contact\Jobs\SendEmailJob;
use Pondit\Contact\Mail\ContactMailable;
use Pondit\Contact\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact::contact');
    }

    public function send(Request $request)
    {


//        foreach ($explodedEmails as $email){

            SendEmailJob::dispatch($request->except('_token'))->delay(now()->addSeconds(10));
//            dispatch(new SendEmailJob())->onQueue('emails');
//              Contact::create($request->all()+['email_from'=>$mail]);

//        }

        dd('die');
        return redirect()->back();
    }
}
