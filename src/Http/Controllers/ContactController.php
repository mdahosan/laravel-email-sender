<?php

namespace Pondit\Contact\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Pondit\Contact\Jobs\SendEmailJob;
use Pondit\Contact\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact::contact');
    }

    public function send(Request $request)
    {

        try{
            SendEmailJob::dispatch($request->except('_token'))->delay(now()->addSeconds(10));
            Contact::create($request->all());
            
            return redirect()->back()->withMessage('Successfully Sent !');
        }catch (QueryException $exception){
            dd($exception->getMessage());
        }
    }
}
