<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostContact;
use App\Services\BossSend;
use App\Models\Contact;
use App\Services\MangerSend;


class PageController extends Controller
{
    public function contact(){
        return view('contact');
    }

    public function postContact(StorePostContact $request){
        $boss=new MangerSend();
        $send_db=$boss->make('db');
        $send_db->setData(
                $request->input('fName'),
                $request->input('fPhone'),
                $request->input('fText')
            );
        $send_db->sendData();

        $send_mail=$boss->make('mail');
        $send_mail->setData(
            $request->input('fName'),
            $request->input('fPhone'),
            $request->input('fText')
        );
        $send_mail->sendData();
        return 1;
    }

}
