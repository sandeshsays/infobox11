<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if 'locale' is present in the session

        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        }
        // else{
        //     App::setLocale('np');
        // }
        // if (session()->has('locale')) {
        //     $locale = session()->get('locale');
        //     if ($locale == 'en') {
        //         App::setLocale('en');
        //     } else {
        //         App::setLocale('np');
        //     }
        // } else {
        //     // Default locale if not set
        //     // session()->put('locale','np');
        //     App::setLocale('np');
        // }

        return $next($request);
    }
}
