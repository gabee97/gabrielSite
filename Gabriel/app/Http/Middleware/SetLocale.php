<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->segment(1) === 'en' ? 'en' : 'pt';
        app()->setLocale($locale === 'pt' ? 'pt_BR' : 'en');
        URL::defaults(['locale' => $locale]);
        return $next($request);
    }
}
