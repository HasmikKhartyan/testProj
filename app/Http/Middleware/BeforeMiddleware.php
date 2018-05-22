<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Description of BeforeMiddleware
 *
 * @author Developer
 */
class BeforeMiddleware
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
//    public function handle($request, Closure $next)
//    {
//        // Do Stuff
//        if(!Auth::check()){
//            return "please login";
//        }
//
////        if(!Auth::user()->access){
////            return redirect('dashboard');
////        }
////        $requester_id     = $request->get('user_id');
////        $client_id        = $request->get('client_id');
////        $data['get']      = $_GET;
////        $data['post']     = $_POST;
////        $data['request']      = $request->all();
////        $route            = $request->route();
////        $controllerAction = (isset($route[1]) && isset($route[1]['uses']) ? $route[1]['uses']
////                : null );
////
////        \App\Models\v2\Log::createLog([
////            'type' => 'input',
////            'ip' => $request->ip(),
////            'requester_id' => $requester_id,
////            'client_id' => $client_id,
////            'controller_action' => $controllerAction,
////            'data' => \GuzzleHttp\json_encode($data)
////        ]);
//
//        return $next($request);
//    }
}