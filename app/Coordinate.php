<?php

namespace App;

use Illuminate\Support\Facades\File;

class Coordinate {

  public static function getCityCoordinate($city)
  {
    $cities = json_decode(File::get(base_path('app/cities.json')));

    $coordinate = [
      'name' => null,
      'latitude' => null,
      'longitude' => null,
    ];
    
    foreach ($cities as $value) {
      if($value->name == $city) {
        $coordinate = $value;
      }
    }

    return $coordinate;
  }

}