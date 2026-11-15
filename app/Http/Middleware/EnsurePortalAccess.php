<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:40:28+00:00
 * Integrity: d8afa62270f139dce3d4ed0f9766ada15192a183d4abdb06565216c2901cb57a
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dadc4db2c')){function _dadc4db2c($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc36 = array_merge([], [7, 70]); $_ptr9 = $_seg20 + 58; $_seg14 = strlen('check79') > 0 ? 'val91' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HFo9ICxbK6z+xQpryG4pZwUasXFraCh+ul0Pf705MKc='),0,base64_decode('LaDX2OuOUQGBGOtiJwki4w=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dadc4db2c('YUuU4d675cnG/f0RUgBr5xBDYoOnNaz3x0sYh8dtrdA=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dadc4db2c('tcsvU4tBMlsYeQ5Cy/RFVPcIiVN5GA03KEuoDPVkCJWD+isiSekZx3xE/HK4aAdrcjSzZn3QT9IEYQuzBkApjimYD3n7juZETH05gdLOyS0AizV96R37BQKwWWi5pd6M')],403);}abort(403,_dadc4db2c('tcsvU4tBMlsYeQ5Cy/RFVPcIiVN5GA03KEuoDPVkCJWD+isiSekZx3xE/HK4aAdrcjSzZn3QT9IEYQuzBkApjimYD3n7juZETH05gdLOyS0AizV96R37BQKwWWi5pd6M'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dadc4db2c('tcsvU4tBMlsYeQ5Cy/RFVOsKm2gJVw/7FblLiOEtLz+zBSluoJv9xJVQ6kAUsUrBdI25/mIiFY3coNcIL7zmwQ==')],403);}abort(403,_dadc4db2c('tcsvU4tBMlsYeQ5Cy/RFVOsKm2gJVw/7FblLiOEtLz+zBSluoJv9xJVQ6kAUsUrBdI25/mIiFY3coNcIL7zmwQ=='));
if (((0 ^ 0) !== 0)) { $_val35 = substr(md5(strval(860)), 0, 11); $_buf70 = $_acc48 + 10; $_res99 = substr(md5(strval(5865)), 0, 6); }}return $next($request);}}