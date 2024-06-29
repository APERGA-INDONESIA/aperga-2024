<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Libraries\RedisLib;
use Hash;

class SessionToken
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // "api_auth_login"
    ];

    public function handle(Request $request, Closure $next)
    {
        $noauth = $request->header('no-auth');
        if ($noauth) {
            return $next($request);
        }
        $redis = new RedisLib();
        $auth = $request->header('protec-auth');
        $userdata = json_decode($redis->get($auth));
        if ($userdata == null) {
            return response()->json([
                "status" => "Unauthorized"
            ], 401);
        }
        $request->userdata = $userdata;
        $request->token = $auth;
        return $next($request);
    }
}
