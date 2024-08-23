<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller {

    public function SetLanguage($language) {

        App::setLocale($language);
        Session::put("language", $language);
        return redirect()->back();
    }
    
}
