<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{

    public function toggleLanguage($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
