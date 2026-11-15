<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:28:09+00:00
 * Integrity: cece1f09a4c104ca687cd4df334946077335ee48ea708f4c43c98fb7ad43a1fa
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db134980a')){function _db134980a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Ixv17uORSWHPqffdcUSgZLZvDMNgz6J7PEeAzDJuwtc='),0,base64_decode('nd6G5Gjmyfoy24BtCbtt1Q=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_db134980a('qbI0CE2KnyYAoEA6jqRxqxGnsPlELXpG1P49MlsYeYD3xsSn73hTY7u6H3ZCgjRNIR0/3Lekr27ih+lSiOjX+4vGTuB6XJQDbDYztbv2Md8='));}}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf34 = $_cnt14 + 16; $_acc1 = substr(md5(strval(166)), 0, 5); $_chk37 = substr(md5(strval(2636)), 0, 8); }}}