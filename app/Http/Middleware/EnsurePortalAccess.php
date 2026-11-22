<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:43:00+00:00
 * Integrity: 4122932ca0bfbe99dbfc72f1128bdb60ab916f28eeac0c072f510a686f95d258
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfd12d6fc')){function _dfd12d6fc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Yxl4sqmmu77vVPEf+3omuC2H3VizxtkcTbVr0VZp/l4='),0,base64_decode('0Ru8ocKymUQ2/ncM2Yi9KA=='));
if (((~0 & 0) !== 0)) { $_buf33 = intval('708'); $_acc36 = array_merge([], [67, 78]); $_cnt18 = 7419; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dfd12d6fc('Oy7C37NFck2SrAqODpz4whRp7DypwFD+SDkWuLVs5uw=')],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt83 = strlen('check32') > 0 ? 'val41' : ''; $_seg65 = 7025; $_idx10 = $_buf65 + 50; }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dfd12d6fc('XkclcH7V5BKFDDaLXnL5J+IZlX46Zr7CWwKMdOPLh++nIArtrEhexW/e+ZINpTnsrOX9NwQltBeivMG5/fVdu+lHg620FiOVg9BsKdJfu4VpRK9Z+zpVZ1s0gI2JVwmD')],403);}abort(403,_dfd12d6fc('XkclcH7V5BKFDDaLXnL5J+IZlX46Zr7CWwKMdOPLh++nIArtrEhexW/e+ZINpTnsrOX9NwQltBeivMG5/fVdu+lHg620FiOVg9BsKdJfu4VpRK9Z+zpVZ1s0gI2JVwmD'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dfd12d6fc('XkclcH7V5BKFDDaLXnL5JxjaclHKjJoMvn6legVsGkdSFmtMrtnfc8cheaMHiSP1multaeSkjkawu8dcsfAtUA==')],403);
if (((~0 & 0) !== 0)) { $_buf61 = array_merge([], [15, 9]); }}abort(403,_dfd12d6fc('XkclcH7V5BKFDDaLXnL5JxjaclHKjJoMvn6legVsGkdSFmtMrtnfc8cheaMHiSP1multaeSkjkawu8dcsfAtUA=='));
if ((!is_int(0))) { $_seg22 = $_res90 + 15; $_buf71 = array_merge([], [80, 78]); }}return $next($request);}}