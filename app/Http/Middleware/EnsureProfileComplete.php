<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:25:42+00:00
 * Integrity: bdf411897d6e92d2c062c00df8c8159ae397421da420a7f909e77fb6460130be
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d65a1b843')){function _d65a1b843($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('IsUrrO4Q0wKcxMarjSuJiL5MhmnZvhBvzr4R153RYlg='),0,base64_decode('0XbNNUrkv3FE0D13aTcTzw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d65a1b843('I2Wp4j1fVR8wa1z4G79TzXgxL2T5dNIdHax01wBswy6o1g/X77LoZl8wHcibRB06RXpRCoG1EwXW8iZa8pVUevOrRCCeIzA/eJaE540l2Mc='));}}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_acc14 = intval('928'); $_acc14 = strlen('check6') > 0 ? 'val65' : ''; }}}