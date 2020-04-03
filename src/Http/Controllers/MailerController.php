<?php

namespace Pondit\Mailer\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Pondit\Mailer\Mail\PonditMailable;
use Pondit\Mailer\Models\Mailer;
use Illuminate\Support\Facades\Mail;


class MailerController extends Controller
{

    public function index()
    {
        return view('mailer::form');
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
                    ->later($when, new PonditMailable($data));
                $i += 1;
            }

//            SendEmailJob::dispatch($request->except('_token'))->delay(now()->addSeconds(10));
            $data['email_to'] = $commaSeparatedEmails;
            $data['total_emails'] = count($emailArray);
            Mailer::create($data);

            return view('mailer::form', ['message'=>'Success !']);

        }catch (QueryException $exception){
            dd($exception->getMessage());
        }
    }
}
