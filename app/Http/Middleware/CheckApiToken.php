<?php

namespace App\Http\Middleware;
use App\User;

use Closure;

class CheckApiToken
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
        $auth_token = $request->header('authorization');

        if(empty($auth_token)) {
            return response()->json([
                'success' => false,
                'error' => '401! Unautorized, API Token mancante'
            ]);
        }

        $api_token = substr($auth_token, 7);

        $api_token_hash = hash('sha256', $api_token);
        $user = User::where('api_token', $api_token_hash)->first();
        if($user === null){
            
            return response()->json([
                'success' => false,
                'error' => 'API Token errato'
            ]);
        }
        
        return $next($request);
    }
}
