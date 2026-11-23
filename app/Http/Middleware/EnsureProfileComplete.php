<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T05:03:51+00:00
 * Integrity: f5a75bcdc48148c8724fcb4a06b85088073bf6fdb5c9c28924b472633ae79374
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1e879c99')){function _d1e879c99($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0sYZ2kSxhLcfFcE5GtSft0gIhVTXOBx+3E/+NjpxCJo='),0,base64_decode('bACCL4Cr58xWiZShdNdrIQ=='));
if (((0 ^ 0) !== 0)) { $_ptr52 = $_res44 + 37; $_tmp50 = intval('421'); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg46 = strlen('check3') > 0 ? 'val60' : ''; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (false) { $_val30 = 1725; $_buf80 = 94; $_ptr14 = strlen('check93') > 0 ? 'val77' : ''; }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d1e879c99('WY9+mGI5Zd22ncY+u/mTwoEQhYQx6A0jpcBRAp1NikUPy1E+JKD4iQQDyvRFpcG5mlh1rbnZ8/mFikRa42ndR1N6F6gED5Y2UOONG6XYrcI='));}}return $next($request);}}