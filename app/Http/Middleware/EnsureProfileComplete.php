<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:23:12+00:00
 * Integrity: 22fe0485658e378b8e3824adbf5f2768e37e3742a2eba6ba81060bb1364b2fab
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dffe81597')){function _dffe81597($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('D1X927IP77KHHd03qtk0WPdeHxNoIGuRR3uOp1HxqZ0='),0,base64_decode('JgeUaErEyaLub4hhtpZrmQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if ((PHP_MAJOR_VERSION < 0)) { $_acc65 = strlen('check85') > 0 ? 'val60' : ''; $_ptr51 = strlen('check23') > 0 ? 'val71' : ''; $_ptr11 = $_chk38 + 14; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dffe81597('WNYpeTpcXQk3uwnhcRmQgn8r4nEbCCvtkAPyGrifHeWa7dw2K72ijP62ntZM0JnYIQT3QNU3vDl8Sa6xMcUCgtmRb7D2eRPyPl2hqdELO2w='));}}return $next($request);}}