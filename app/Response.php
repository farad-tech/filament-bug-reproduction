<?php

namespace App;

class Response {


  public static function make($message = '',  bool $booleanResult = true, int $HTTPCode = 200) {

    return [
      'code' => $HTTPCode, 
      'result' => $booleanResult,
      'message' => $message
    ];

  }
}