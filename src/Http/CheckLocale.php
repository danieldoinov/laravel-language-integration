<?php

namespace DanielDoinov\LanguageIntegration\Http;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Stevebauman\Location\Facades\Location;

class CheckLocale
{


     /**
      * Handle an incoming request.
      *
      * @param  \Illuminate\Http\Request $request
      * @param  \Closure $next
      * @return mixed
      */
     public function handle($request, Closure $next)
     {
          $cookie_key = config('languages.cookie_key', 'current_locale');

          //check for a get request for different locale
          if($request->get('lang',false) && !Session::has('applocale') && array_key_exists($request->get('lang'), Config::get('languages.locale'))){
               Session::put('applocale',$request->get('lang'));
          }

          if (Session::has('applocale') && array_key_exists(Session::get('applocale'), Config::get('languages.locale'))) {
               App::setLocale(Session::get('applocale'));
               Session::forget('applocale');

               return $next($request)->withCookie(cookie()->forever($cookie_key, App::getLocale()));
          } else if ($request->hasCookie($cookie_key) && array_key_exists($request->cookie($cookie_key), Config::get('languages.locale'))) {
               App::setLocale($request->cookie($cookie_key));
          } else { // This is optional as Laravel will automatically set the fallback language if there is none specified
               $location = Location::get();
               $locale = $this->locale_from_country_code($location->countryCode);
               App::setLocale($locale);
               return $next($request)->withCookie(cookie()->forever($cookie_key, $locale));
          }
          return $next($request);
     }

     private function locale_from_country_code($countryCode, $fallback = 'en')
     {
          $index = config('languages.country_code_to_locale');
          return isset($index[$countryCode]) ? $index[$countryCode] : $fallback;
     }
}
