<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    public function handle(Request $request, Closure $next): Response
    {
//        return $next($request)
//            //Acrescente as 3 linhas abaixo
//            ->header('Access-Control-Allow-Origin', "*")
//            ->header('Access-Control-Allow-Methods', "PUT, POST, DELETE, GET, OPTIONS")
//            ->header('Access-Control-Allow-Credentials', true)
//            ->header('Access-Control-Allow-Headers', 'Accept, X-Requested-With, Content-Type, X-Token-Auth, Authorization')
//            ->header('Access-Control-Expose-Headers', 'X-Debug-Info')
//            ->header('Accept', 'application/json');
        if ($request->isMethod('OPTIONS')) {
            $response = response('', 200);
        } else {
            $response = $next($request);
        }
        $response->header('Access-Control-Allow-Methods', 'HEAD, GET, POST, PUT, PATCH, DELETE');
        $response->header('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'));
        $response->header('Access-Control-Allow-Origin', '*');
        return $response;
    }
}
