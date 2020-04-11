<?php

namespace App\Http\Middleware;

use Closure;
use App\Language;
use App\Setting;
use Crypt, Config, Cookie, Auth;

class Localization
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
        $language = false;
        $user = false;
        if (Auth::user()) {
            $user = Auth::user();
        }

        if (!$language) {
            //echo '1';
            $language = Cookie::get('language');
            if ($language && strlen($language) > 2) {
                $language = Crypt::decryptString($language);
            }
        }

        if (!$language) {
            if ($request->hasHeader('Accept-Language')) {
                $language = \strtolower(\substr($request->header('Accept-Language'), 0, 2));
            }
        }

        Config::set('app.site_language', Language::where('code', '=', $language)->get()->first());
        app()->setLocale($language);
        return $next($request);
    }
}
