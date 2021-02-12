<?php
namespace App\Services;

use App\Services\Interfaces\ISendContact;
use Mail;

class MailSendService implements ISendContact
{
    protected $name;
    protected $phone;
    protected $text;

    public function setData($name="",$phone="",$text="")
    {
        $this->name=$name;
        $this->phone=$phone;
        $this->text=$text;
    }

    public function sendData()
    {
        $emails = array('eropa@live.ru');
        $message = "";
        $message .= "<p>Имя - <b>". $this->name ."</b></p>";
        $message .= "<p>Телефон  - <b>".$this->phone."</b></p>";
        $message .= "<p>Текст  -  <b>".$this->text."</b></p>";
        $data = ['foo' => $message];
        foreach ($emails as $items){
            $to = $items;
            Mail::send('emails.clearblank',$data, function ($m)  use ($to) {
                $m->from('trata@gmail.com', 'galinatomas.md ');
                $m->to($to,'Noreplay')->subject('Новое сообшение');
            });
        }

    }

}
