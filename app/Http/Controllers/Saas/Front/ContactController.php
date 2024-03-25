<?php

namespace App\Http\Controllers\Saas\Front;

use App\Http\Controllers\Controller;
use App\Models\BasicSettings\Basic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ContactFormMail;
use App\Notifications\SendMessageToEndUser;
use App\Mail\TestEmail;
class ContactController extends Controller
{
	public function contact()
	{
		
		$language = $this->getLanguage();

		$queryResult['seoInfo'] = $language->seoInfo()->select('meta_keyword_contact', 'meta_description_contact')->first();

		$queryResult['pageHeading'] = $this->getPageHeading($language);

		$queryResult['bgImg'] = $this->getBreadcrumb();

		$queryResult['info'] = Basic::select('email_address', 'contact_number', 'address', 'latitude', 'longitude', 'google_recaptcha_status')
			->firstOrFail();

		return view('saas.front.contact', $queryResult);
	}

	public function sendMail(Request $request)
	{

		try {
			$request->validate([
				'name' => 'required',
				'email' => 'required|email',
				'subject' => 'required',
				//'mobile' => 'required',
				'message' => 'required',
			]);
	
			$data = [
				'name' => $request->input('name'),
				'email' => $request->input('email'),
				'subject' => $request->input('subject'),
				'mobile' => $request->input('mobile'),
				'message' => $request->input('message'),
			];
	
			Mail::to('info@sirms.edu.pk')->send(new ContactFormMail($data));
		   Mail::to($request->input('email'))->send(new SendMessageToEndUser($request->input('name')));
	
		   $request->session()->flash('success', 'Your message has been sent. Thank you!');
		 } catch (\Exception $e) {
			$request->session()->flash('error', 'Error sending the message. Please try again later.');
		 }
		 
	     return redirect()->back();
	}
}
