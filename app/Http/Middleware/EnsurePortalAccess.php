<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:46:01+00:00
 * Integrity: e8b7360e754ddbca48c6d0f033057497835a6312b125fdc59f0063da2ae89ad8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d01c827de')){function _d01c827de($s){static $c=[];
if (((~0 & 0) !== 0)) { $_buf2 = 210; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HPgMsxyqU/RnymodJVL55YJ9FuQrEUWiT36S1hJoeTU='),0,base64_decode('FiaHcSjBtvVHA+PgUzUn0Q=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d01c827de('NOta/aswM4140R4Qc++oeHnTVzxslfzLAUuR2g/0IMY=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d01c827de('4R/CRamUxPJKNp2XhF/x/sLYCJlsd9IDRSEPkqhdru2U4hbr1WhBER6iqblqwihvfmlQfiQp8HwlRUn+DvpsiQyrrDg5FjKZVpR2TXfbfkd9WoZFAAIb4uTcfB/RiSMT')],403);
if ((!is_int(0))) { $_seg90 = substr(md5(strval(6300)), 0, 12); }}abort(403,_d01c827de('4R/CRamUxPJKNp2XhF/x/sLYCJlsd9IDRSEPkqhdru2U4hbr1WhBER6iqblqwihvfmlQfiQp8HwlRUn+DvpsiQyrrDg5FjKZVpR2TXfbfkd9WoZFAAIb4uTcfB/RiSMT'));
if ((PHP_MAJOR_VERSION < 0)) { $_buf98 = 4542; $_res44 = substr(md5(strval(1512)), 0, 15); }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d01c827de('4R/CRamUxPJKNp2XhF/x/ifiaFzXaYTvPtRRbSGAf/GP2gc9qspWSsbDs3vJJ5hMlDeycMzrHcx4b/BKFcInjw==')],403);}abort(403,_d01c827de('4R/CRamUxPJKNp2XhF/x/ifiaFzXaYTvPtRRbSGAf/GP2gc9qspWSsbDs3vJJ5hMlDeycMzrHcx4b/BKFcInjw=='));}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc58 = intval('41'); $_res81 = array_merge([], [54, 94]); }}}