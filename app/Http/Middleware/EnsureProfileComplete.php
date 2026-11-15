<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:46:25+00:00
 * Integrity: 5dc076367dca2aca8216f163718bf09dc1ac6d174d5e80534a1715a9a20a58f6
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd1760378')){function _dd1760378($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('03FF0rq0MKukLfOGQPkCeYj8JyDUq2eS3Aoscdg0rA8='),0,base64_decode('rb/hbB8ciVNbq2ldkogo6A=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dd1760378('Um0wxBrnsgRh8y3Wibm/gvEb7YfK1lHr/rDjykfcB0cqYuoguPut9k69HL1EOl6K8andfk666MIjruXbzpWJrBTcb2+J5ZE6vgu1qJPTywo='));}}return $next($request);}}