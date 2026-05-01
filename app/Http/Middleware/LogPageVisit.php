<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\PageVisit;
use Stevebauman\Location\Facades\Location;

class LogPageVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ipAddress = $request->ip();

        // Öz IP ünvanınızı və lazımsız (Admin/POST) sorğuları bazaya yazmamaq üçün şərtdən istifadə edirik
        if ($ipAddress !== env('OWNER_IP') && !$this->shouldExclude($request)) {
            $country = null;
            if ($location = Location::get($ipAddress)) {
                $country = $location->countryCode;
            }

            PageVisit::create([
                'ip_address' => $ipAddress,
                'country'    => $country,
                'path'       => $request->fullUrl(), // Bütün linki görmək üçün fullUrl() istifadə edirik (məs: https://aliyevstudio.com/services)
                'user_agent' => $request->userAgent(),
                'referrer'   => $request->headers->get('referer'),
            ]);
        }

        return $next($request);
    }

    /**
     * Determine if the request should be excluded from logging.
     */
    protected function shouldExclude(Request $request): bool
    {
        // Exclude specific paths like admin panels, APIs, etc.
        $excludedPaths = [
            'admin/*'
        ];

        return $request->is(...$excludedPaths) || $request->isMethod('post');
    }
}
