<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:34:56+00:00
 * Integrity: 1616d70ea295bee04dbd2667613704e9a193fe91f5bd7deff383c04143dd6e93
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5893ff21')){function _d5893ff21($s){static $c=[];
if (false) { $_acc15 = array_merge([], [93, 19]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7eYT2MEmwY/KeuIjQGUVlERY0JQ5648aUFR6/CARz5U='),0,base64_decode('zGUA0UDL/cOEaGinyiZfjA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d5893ff21('138OtzJ2XTJEFObBD0ow9O/4MhWydS/V+/rKMp4OpeI=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (((~0 & 0) !== 0)) { $_seg98 = intval('309'); $_idx68 = array_merge([], [44, 54]); }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d5893ff21('K7Y+EOksKbPCMiPw2ouAbkyD3xfluMpOPdOauU69CQcazUVtxy8AHwLFgda9Azu6ANI/7H+9K0bWJM9ZHL9fcAyEmc7uspp0gdd5Xp6Ehp8CwTpBvm1lhuv9zw5tdOLd')],403);}abort(403,_d5893ff21('K7Y+EOksKbPCMiPw2ouAbkyD3xfluMpOPdOauU69CQcazUVtxy8AHwLFgda9Azu6ANI/7H+9K0bWJM9ZHL9fcAyEmc7uspp0gdd5Xp6Ehp8CwTpBvm1lhuv9zw5tdOLd'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_val12 = $_cnt43 + 20; $_chk8 = 794; }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d5893ff21('K7Y+EOksKbPCMiPw2ouAbs1duHy+KaCJo6zsTvEacwP/OTSTZABHba37DmGFBN5jR+9e2nO4eN1N4uA44x/zSw==')],403);}abort(403,_d5893ff21('K7Y+EOksKbPCMiPw2ouAbs1duHy+KaCJo6zsTvEacwP/OTSTZABHba37DmGFBN5jR+9e2nO4eN1N4uA44x/zSw=='));
if (((~0 & 0) !== 0)) { $_chk5 = strlen('check30') > 0 ? 'val83' : ''; $_chk67 = intval('629'); }}return $next($request);}}