<?php
namespace App\Services\Interfaces;

interface ISendContact
{
    public function setData($name="",$phone="",$text="");
    public function sendData();
}
