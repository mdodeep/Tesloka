<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:02:59+00:00
 * Integrity: 4edd3c90534f55b33f572aa5269c8814b50e3f7edbc23e0daa0329b9f63e51ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dba71d969')){function _dba71d969($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('odnFAxn1RF8atTNPp92EP/ZcMHnWltdfd2IM4P+lCRg='),0,base64_decode('TYRlq3zsf8mt65Tp0zjZEQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dba71d969('Wpo93fGfLOZPTYS+ShR6IR5zypxdfQ6NTSDy9XmvQ9oXCOROUHtDVYhfq+hRbHDjOMvAjvEd6vCz1xnYNZNG1vVB8Z/18/rkGukKDQ+xQsg=')],403);}abort(403,_dba71d969('71EFE1ugilS6HGnEjVBTyzlqoBr4yLO9VCWqW7mX+/FRm0DW9D3TFoj/W3I0VoI1L5+lWEQ0rMMl4OH27G139WXv7mE/n34lALyTo3M/NlyGRoNsiret7Y0qAYTBopmp'));}return $next($request);}}