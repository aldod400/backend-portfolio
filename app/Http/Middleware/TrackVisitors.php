<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only track portfolio routes (not admin/API routes)
        if (!$request->is('admin/*') && !$request->is('livewire/*') && !$request->is('_debugbar/*')) {
            $ip = $request->ip();
            $userAgent = $request->userAgent();
            $pageVisited = $request->path();
            $referer = $request->header('referer');

            // Check if same IP visited the same page in the last hour (to avoid spam)
            $recentVisit = Visitor::where('ip_address', $ip)
                ->where('page_visited', $pageVisited)
                ->where('created_at', '>', Carbon::now()->subHour())
                ->first();

            if (!$recentVisit) {
                try {
                    Visitor::create([
                        'ip_address' => $ip,
                        'user_agent' => $userAgent,
                        'page_visited' => $pageVisited,
                        'referer' => $referer,
                        'country' => $this->getCountryFromIP($ip),
                        'city' => null, // Can be implemented with IP geolocation service
                    ]);
                } catch (\Exception $e) {
                    // Silent fail to not break the site
                    Log::error('Visitor tracking failed: ' . $e->getMessage());
                }
            }
        }

        return $next($request);
    }

    /**
     * Get country from IP (basic implementation)
     * You can integrate with services like ipapi.com or geoip2
     */
    private function getCountryFromIP($ip)
    {
        // Basic check for local IPs
        if ($ip === '127.0.0.1' || $ip === '::1' || $this->isPrivateIP($ip)) {
            return 'Local';
        }

        // For production, you would use a service like:
        // $response = file_get_contents("http://ip-api.com/json/{$ip}");
        // $data = json_decode($response, true);
        // return $data['country'] ?? 'Unknown';

        return 'Unknown';
    }

    /**
     * Check if IP is private
     */
    private function isPrivateIP($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false;
    }
}
