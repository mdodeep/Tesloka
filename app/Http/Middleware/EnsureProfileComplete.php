<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:21:26+00:00
 * Integrity: 8f90fb12585ba5433e80e954547474262d9a60cce968d861279d136af920b5bb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfdc7b1db')){function _dfdc7b1db($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Xak1ttuYWUZVobBAHqjWoDYPWweQ7s/OwAn+BLz1Gfk='),0,base64_decode('Ya8iOIHc8OPPhxnQvYscBw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dfdc7b1db('F7EsgVPAIeOE3J8SQfyJMP/QDuKUsRF+BvAiWiiDoQzL7/mquWpCp0QUdzuGnG2cnoEuu7GvNPx1c28p7HFbZBMrwCTRkv5/PZ6LzI0ltCw='));}}return $next($request);}}