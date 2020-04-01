<?php

namespace Pondit\Contact\Http\Controllers;


use App\Http\Controllers\Controller;
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

//            {
//                $user=User::all();
//                Mail::queue('send', ['user' => $user],
//
//                    function($m) use ($user)
//                    {
//                        foreach ($user as $user)
//                        {
//                            $m->to($user->email)->subject('Email Confirmation');
//                        }
//                    });
//            }

            $commaSeparatedEmails = str_replace("\r\n",",",$request->email_to);
            $emailArray = explode(',', $commaSeparatedEmails);

            $data = $request->except('email_to');
//dd($data);

            $i = 5;
            foreach ($emailArray as $email){
                $when = now()->addSeconds($i);

                Mail::to($email)
                    ->cc('mdahosanhabib@outlook.com')
                    ->later($when, new ContactMailable($data));
                $i += 5;
            }

//            SendEmailJob::dispatch($request->except('_token'))->delay(now()->addSeconds(10));

            $data['email_to'] = $commaSeparatedEmails;

            Contact::create($data);

            return redirect()->back()->withMessage('Successfully Sent !');
        }catch (QueryException $exception){
            dd($exception->getMessage());
        }
    }
}
