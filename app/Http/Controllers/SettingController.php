<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    
    public static function get(string $slug): string|int|null
    {

        return Setting::where('slug', $slug)->first()->value ?? null;

    }

}
