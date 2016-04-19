<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;
use Storage;
use Session;

use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {

    	return view('contact.index');

    }

    public function send(ContactRequest $request)
    {
		
			$data = $request->only('name', 'email', 'phone', 'subject');
	    $data['messageLines'] = explode("\n", $request->get('message'));

			$file = $request->file('attachement');
			$path = public_path('uploads/mail_attachments');
			
			if(!empty($file))
			{
				Storage::disk('mail')->put($filename = $file->getClientOriginalName(), file_get_contents($file));
				$data['attachement'] = $filename;

				Mail::send('contact.email', $data, function ($message) use ($data) 
				{
	      	$message->subject('LMS Kontakt: '.$data['subject'])
	              	->to('workshop@localmotospot.pl')
	              	->replyTo($data['email'])
	              	->attach(public_path('uploads/mail_attachments') . '/' . $data['attachement']);
				});
				Storage::disk('mail')->delete($filename);
			}
			else
			{
    		Mail::send('contact.email', $data, function ($message) use ($data) 
    		{
      		$message->subject('LMS Kontakt: '.$data['subject'])
              		->to('workshop@localmotospot.pl')
              		->replyTo($data['email']);
    		});
  		}
  	Session::flash('flash_message', 'Dziękujemy, Twoja wiadomość została wysłana.');
    return back();
  }

}

