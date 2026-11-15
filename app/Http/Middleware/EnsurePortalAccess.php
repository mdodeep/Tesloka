<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:23:49+00:00
 * Integrity: 0fb7da579819f0745c6eb0036d75d2db29eb85d0f9e2bcc4e87b87537f884cbe
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7d6d5da4')){function _d7d6d5da4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3voPH1Wqi50EO9sVBFIOboNQfernC+eZ9aPcU3Xo/Fk='),0,base64_decode('miMsa8FlLF/MhSTUtxVczg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d7d6d5da4('IvwQrt44yNAGghDZ7sT5WsDkG/aRxzRELJ2dOOIDVvU=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d7d6d5da4('jd10Vba4yUCaZUz/NXlVXT2epweIfCR+g3GfIxbRj3taEkvSG/xLfTMP6nIUnCMUn76yLaJ0SnSvn7o3ibbjYfJ3HG/DDxb3v2Sr7DVWKDrXVZFLWXhSEOA27dFeQwKl')],403);}abort(403,_d7d6d5da4('jd10Vba4yUCaZUz/NXlVXT2epweIfCR+g3GfIxbRj3taEkvSG/xLfTMP6nIUnCMUn76yLaJ0SnSvn7o3ibbjYfJ3HG/DDxb3v2Sr7DVWKDrXVZFLWXhSEOA27dFeQwKl'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d7d6d5da4('jd10Vba4yUCaZUz/NXlVXWspgZyGojMNwlhV3BcT5boMOzNMdEo+Xg5KBRI6WIF0N5Mrx2QP9QzowkXtOcjqvw==')],403);}abort(403,_d7d6d5da4('jd10Vba4yUCaZUz/NXlVXWspgZyGojMNwlhV3BcT5boMOzNMdEo+Xg5KBRI6WIF0N5Mrx2QP9QzowkXtOcjqvw=='));}return $next($request);}}