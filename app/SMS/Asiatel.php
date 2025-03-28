<?php

namespace App\SMS;

use App\Models\SMS;
use SoapClient;

class Asiatel
{

  public static function send($phone_number, $Content)
  {

    $url = "http://payammatni.com/webservice/send.php?wsdl";

    $soap = new SoapClient($url, array("encoding" => "UTF-8"));

    $sms_config = SMS::first();

    $username = $sms_config->username;
    $password = $sms_config->password;
    $fromNum = $sms_config->fromnumber;

    $toNum = array($phone_number);
    $Type = '0';


    $array = $soap->SendSMS($fromNum, $toNum, $Content, $Type, $username, $password);
  }

}