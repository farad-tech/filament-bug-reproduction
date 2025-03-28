<?php

namespace App\SMS;

use App\Models\SMS;
use SoapClient;

class Ippannel
{

  public static function send($phone_number, array $data, string $patten_code)
  {

    $client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");

    $sms_config = SMS::first();

    $user = $sms_config->username;
    $pass = $sms_config->password;
    $fromNum = $sms_config->fromnumber;

    $toNum = ["$phone_number"];
    $pattern_code = $patten_code;
    $input_data = $data;

    $client->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);

  }

}