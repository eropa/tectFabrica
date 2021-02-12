<?php
namespace App\Services;


use App\Services\Interfaces\ISendManager;

class MangerSend implements ISendManager
{
    public function make($name)
    {
        //Делаем все в нижнем регистре
        $type= strtolower($name);
        switch ($type) {
            case 'mail':
                return new MailSendService();
            case 'db':
                return new DbSendService();
            default :
                throw new \http\Exception\InvalidArgumentException("Sorry not class");
        }
    }
}
