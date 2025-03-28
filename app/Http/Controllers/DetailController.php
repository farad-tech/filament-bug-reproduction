<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public $app_name;

    public $app_url;

    public function __construct()
    {
        $detail = storage_path('app' . DIRECTORY_SEPARATOR . 'detail-file.json');

        $this->app_name = 'iAds';

        $this->app_url = 'http://localhost';

        if (file_exists($detail)) {

            $detail = json_decode(file_get_contents($detail), true);

            $this->app_name = $detail['app_name'];

            $this->app_url = $detail['app_url'];
        }
    }
}
