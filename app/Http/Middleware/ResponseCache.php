<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ResponseCache
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,  $duration = 60)
    {

        $key = '__response' . md5($request->fullUrl());
        if (Cache::has($key)) {
            $cached = Cache::get($key);
            return response($cached['content'])
                ->withHeaders($cached['headers']);
        }
              // Otherwise, handle the request and cache the response
        $response = $next($request);

        // Only cache successful (200 OK) HTML responses
        if ($response->status() === 200 && str_contains($response->headers->get('Content-Type'), 'text/html')) {
            Cache::put($key, [
                'content' => $response->getContent(),
                'headers' => $response->headers->all(),
            ], now()->addMinutes($duration));
        }

        return $response;
    }
}
