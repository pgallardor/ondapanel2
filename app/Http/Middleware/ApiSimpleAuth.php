<?php

namespace App\Http\Middleware;

use Closure, Request, Response;

class ApiSimpleAuth
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
        if (Request::getUser() != 'ondasonora' || Request::getPassword() != 'sonoraonda'){
            $headers = array('WWW-Authenticate' => 'Basic');
            return Response::make('Invalid credentials', 401, $headers);
        }
        
        return $next($request);
    }
}
