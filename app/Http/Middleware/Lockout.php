<?php
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class LockoutMiddleware
{
    public function handle(Request $request, $next)
    {
        $key = $this->resolveRequestSignature($request);

        $limiter = app(RateLimiter::class)->byKey($key);

        // Set max login attempts to 3
        $maxAttempts = 3;

        // Set lockout duration to 1 minute
        $lockoutDuration = 60;

        if ($limiter->tooManyAttempts($key, $maxAttempts)) {
            $retryAfter = $limiter->availableIn($key);
            return response("You have exceeded the maximum number of login attempts. Please try again in {$retryAfter} seconds.", 429);
        }

        $limiter->hit($key);

        if ($limiter->tooManyAttempts($key, $maxAttempts)) {
            $limiter->clear($key);
            $limiter->lock($key, $lockoutDuration);
        }

        return $next($request);
    }

    protected function resolveRequestSignature(Request $request)
    {
        return sha1(
            $request->method() .
            '|' . $request->server('SERVER_NAME') .
            '|' . $request->path() .
            '|' . $request->ip()
        );
    }
}
