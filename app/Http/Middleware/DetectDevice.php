<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DetectDevice
{
    private array $mobileKeywords = [
        'mobile', 'android', 'iphone', 'ipad', 'ipod', 'blackberry',
        'windows phone', 'opera mini', 'opera mobi', 'iemobile', 'webos',
        'silk', 'kindle', 'bb10', 'playbook',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $isMobile = $this->detectMobile($request);

        // Allow ?device=mobile or ?device=desktop for testing
        if ($request->has('device')) {
            $isMobile = $request->query('device') === 'mobile';
        }

        $request->attributes->set('isMobile', $isMobile);
        view()->share('isMobile', $isMobile);

        return $next($request);
    }

    private function detectMobile(Request $request): bool
    {
        $userAgent = strtolower($request->userAgent() ?? '');

        foreach ($this->mobileKeywords as $keyword) {
            if (str_contains($userAgent, $keyword)) {
                return true;
            }
        }

        return false;
    }
}
