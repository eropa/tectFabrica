<?php
namespace App\Services;
use App\Models\Contact;
use App\Services\Interfaces\ISendContact;
class DbSendService implements ISendContact
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
        $model=new Contact();
        $model->name=$this->name;
        $model->phone=$this->phone;
        $model->user_text=$this->text;
        $model->save();
    }
}
