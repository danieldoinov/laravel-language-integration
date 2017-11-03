<?php

Route::get(config('languages.route'), function ($lang) {

//     if ($lang && array_key_exists($lang, Config::get('languages.locale'))) {
//          App::setLocale($lang);
//     }
//     dd("set locale to " . App::getLocale());
//     return redirect()->back()->withInput()->withCookie(cookie()->forever(config('languages.cookie_key','current_locale'), App::getLocale()));
     if (array_key_exists($lang, Config::get('languages.locale'))) {
          Session::put('applocale',$lang);
     }
     //dd("set locale to " . App::getLocale());
     return redirect()->back()->withInput();
})->name('languages.route_name')->middleware('web');
