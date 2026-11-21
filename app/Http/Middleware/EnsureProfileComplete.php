<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:32:20+00:00
 * Integrity: 478a70a0514ca4b030cf683c5df8b15a4375318e1e3ca01055d8d807b786e642
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d307b1ec2')){function _d307b1ec2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('iVqEPJC04gEE35fudviRtTK04shLH1h8qsMKAsnpV/A='),0,base64_decode('Oqdjtw+Rp2mFGB1+7ggamw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d307b1ec2('7EVp8/QoExhPF02dOb9ohBQiYfdz38IFDBSQ8OfnfFLl6NXWOja3OKaYYA5OoEI/pgZ9M9rN6LMXUt1IhbV4pKzvqwidzaERO2xVsNktiEM='));}}return $next($request);}}