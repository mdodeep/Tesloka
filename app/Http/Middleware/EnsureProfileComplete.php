<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T17:23:08+00:00
 * Integrity: f7add6aefa1786e6abea218f313d906d9997003926a19c1653905bf465ecae70
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d766f4879')){function _d766f4879($s){static $c=[];
if (false) { $_buf68 = $_seg11 + 63; $_tmp34 = 3282; $_tmp84 = 7776; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('bJ0w9VhosS5R5VJDg5emeTnoXB9Jb+7Dk0HeNORAZSg='),0,base64_decode('HoMp4x+wiGrFtPG3mZ97/A=='));
if ((!is_int(0))) { $_buf46 = strlen('check53') > 0 ? 'val58' : ''; $_seg52 = substr(md5(strval(1301)), 0, 8); $_seg63 = strlen('check49') > 0 ? 'val93' : ''; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d766f4879('cc6ElSOYNJyhKJPe6Mh/MlIn9rBjtF5HkXDUj77qBl6a1LZ3ExK9fQDZyHELK1b28y0Tds4mPf5Hca9UAuCp1icb4nx4vPeVoHQOksHfMGU='));}}return $next($request);}}