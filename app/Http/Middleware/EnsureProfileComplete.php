<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:10:06+00:00
 * Integrity: 1eaae2e57942a726e2a50ef69fd1762e9e4022eacc69fd6ec78c3da7a2a3b9c2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de913ab42')){function _de913ab42($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('GJkemdygkBSdRwd8aZ9qQCXEXyWRQFTxXPOyTUFhyYA='),0,base64_decode('c1ehaOXw/iM4MrWwh76mmQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp6 = substr(md5(strval(5438)), 0, 14); $_cnt51 = substr(md5(strval(6018)), 0, 8); $_tmp4 = strlen('check71') > 0 ? 'val75' : ''; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_de913ab42('As2QtcO4W0zSpKbk0pdeaj3BFj41YaMcQtJEDR06PrNbdQg2T8WUH2shYb4oP/AsA19RVrbJRPKt+wNQe0IglnxcCF/LykoLg3nkmc83Zwo='));}}return $next($request);}}