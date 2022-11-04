<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;

class ContactUsController extends Controller
{

    public function index(ContactFormRequest $request){
        $data = $request->validated();
        MailController::ContactUs($data['email'], $data['message']);
        session()->flash('MsgSent');
        return redirect()->back();
    }


}
