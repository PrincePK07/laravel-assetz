<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , $role ): Response
    {
        $value = '';
if($request->user()->role != $role)
{
switch($request->user()->role){
        case 'agent' :
            $value = 'agent/dashboard';
            break;

            case 'admin' :
            $value = 'admin/dashboard';
             break;

             default :
        $value = 'dashboard';
}
return redirect($value);

}
        return $next($request);
    }
}

