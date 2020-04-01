<?php

namespace Pondit\Contact\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Pondit\Contact\Jobs\SendEmailJob;
use Pondit\Contact\Mail\ContactMailable;
use Pondit\Contact\Models\Contact;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function index()
    {
        return view('contact::contact');
    }

    public function send(Request $request)
    {
        try{
            $commaSeparatedEmails = str_replace("\r\n",",",$request->email_to);
            $emailArray = explode(',', $commaSeparatedEmails);
            $data = $request->except('email_to');
            $i = 2;
            foreach ($emailArray as $email){
                $when = now()->addSeconds($i);
                $email = trim($email);
                Mail::to($email)
//                    ->cc('mdahosanhabib@outlook.com')
                    ->later($when, new ContactMailable($data));
                $i += 1;
            }

//            SendEmailJob::dispatch($request->except('_token'))->delay(now()->addSeconds(10));
            $data['email_to'] = $commaSeparatedEmails;
            Contact::create($data);
            return view('contact::contact', ['message'=>'Success !']);

        }catch (QueryException $exception){
            dd($exception->getMessage());
        }
    }
}
