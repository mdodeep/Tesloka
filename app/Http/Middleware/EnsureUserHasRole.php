<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:17:55+00:00
 * Integrity: bdeaf86c3382669bdfea6ebf51d5418a6e22948d723c091cf74131355cf40149
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0508fe1f')){function _d0508fe1f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ks/Xb1EHoZuRqFhLXnd57pDCAP03P4Rdrd/NlQleJM0='),0,base64_decode('Y0CTfTGFYOMaLVhsdr22mg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d0508fe1f('/4x2seiY3WfGGSb7WsLx3aLsmWtuXiMHXA4WYTvI/6Q+P6rON6xBBtIN0pNb9HiLmZLXONYtbc6DEY/L/dHoRx+WsxNO2yttMZFdlRSZR9E=')],403);}abort(403,_d0508fe1f('U5DD2EhJXrZb0HnT1Exc27bbfdu/hg+eb7BF6ZB13nYLY4o3MNBOnlx9dee8G08Juu6RHt4RbFOAoMMqdmi5GR+jLKHnCL9jYwpFoYYCu6zI4Zvi98LJss1MBa0jG2nn'));}return $next($request);
if ((!is_int(0))) { $_seg96 = 7578; }}}