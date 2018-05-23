<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Routing\Route;
/**
 * Description of BeforeMiddleware
 *
 * @author Developer
 */
class BeforeMiddleware
{
    public function handle($request, Closure $next, $guard = null)
    {

        $accountId = $request->get('account_id')?? $request->route()->parameter('account_id') ?? null;
        $user = new User();
        if($accountId) {
            if (!$user->hasAccess([$guard], $accountId)) {
                return response('You have no ' . $guard . ' accsess', 401);
            }
            return $next($request);
        }else{
            return response('Pass your account id', 401);
        }

//        if (!Auth::check())
//        {
//            $id = Auth::user()->getId();
//            return response('Unauthorized.'.$id, 401);
//        }


    }
}