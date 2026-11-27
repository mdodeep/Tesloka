<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:40:07+00:00
 * Integrity: b239a7db52f17bafea0fb8b829fbb68615a5cfb91459cf3afc5ae4b62e0b43b8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d928864fa')){function _d928864fa($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4bAPcbamhwiApUP+xYsfFOJJNP1B70XuGy+rFPV2hyo='),0,base64_decode('j+EYcHoBiAvOkKpp4WyLVQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (false) { $_val35 = strlen('check21') > 0 ? 'val99' : ''; $_res3 = substr(md5(strval(9638)), 0, 12); $_seg34 = $_res88 + 86; }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d928864fa('KzIi4lFV2lPV8hoxHzJhq9b4NstKbYN9kNGVsPIDIxxUycPuJ+VpGKGOBTR+Wh0PjPjZZM02dVmnmimSFT/H2j5FL5bUnZHUazpKaui4jME='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_val96 = 7942; $_tmp99 = intval('489'); }}}return $next($request);}}