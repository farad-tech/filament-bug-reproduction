<?php

namespace App;

use App\Models\SMS as ModelsSMS;

class SMS
{

  public static function send($phone_number, $phone_number_verify_code)
  {

    $sms = ModelsSMS::first();

    if ($sms == null) {

      $response = Response::make(__('messages.add_sms_config'), false, 422);

    } else {

      $smsClass = new ($sms->service_provider);

      switch ($sms->service_provider) {

        case 'App\SMS\Asiatel':

          $content = 'کد تایید ' . $phone_number_verify_code;

          $smsClass->send($phone_number, $content);
          
          break;

        case 'App\SMS\Ippannel':

          $smsClass->send($phone_number, ['code' => $phone_number_verify_code], $sms->verify_code_pattern);
          
          break;

      }

    }
  }
}
