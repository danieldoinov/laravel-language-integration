<?php
return [
     /*
        |--------------------------------------------------------------------------
        | Cookei key
        |--------------------------------------------------------------------------
        |
        | String that is used for the name of cookie that saves the current locale
        |
        */
    'cookie_key' => 'current_locale',
     /*
      |--------------------------------------------------------------------------
      | Localization information
      |--------------------------------------------------------------------------
      |
      | This array provides the values for the locale and ties a locale to a country code
      |
      */
    'locale' => [
        'en' => 'English',
        'de' => 'Deutsche',
        'es' => 'Español',
        'ru' => 'Русский'
    ],
    'country_code_to_locale' => [
        'US' => 'en',
        'GB' => 'en',
        'CA' => 'en',
        'UM' => 'en',
         //spanish
        'ES' => 'es',
         //german
        'DE' => 'de',
         //Russion
        'RU' => 'ru',
    ],
     /*
       |--------------------------------------------------------------------------
       | Routing
       |--------------------------------------------------------------------------
       |
       | This is the route that can be accessed to dynamically change the
       | current locale value. The request is a GET.
       |
       | !IMPORTANT: Please keep the name of the URL variable as "lang"
       */
    'route' => '/locale/{lang}',
    'route_name' => 'setLocale'

];