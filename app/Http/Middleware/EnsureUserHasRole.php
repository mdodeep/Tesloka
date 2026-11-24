<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T02:29:33+00:00
 * Integrity: 43fdf86efbfbbb1116c9caf705672898348bcddc1b8947fa1b458ec37cb62b52
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1e2cb815')){function _d1e2cb815($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wLItwvj0moblpJFQbKoNPHtFqkBSPzu5z7fLBGa8xWU='),0,base64_decode('MkBsuwn0yJ13uA90Mkmr/A=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if ((PHP_MAJOR_VERSION < 0)) { $_ptr53 = intval('287'); $_buf17 = intval('627'); $_ptr71 = intval('726'); }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d1e2cb815('UYUKwUr3imtligMJCtDbVUmFsUwgQ9Ix8U3O4F53TZO9SF/4c0SdTDo44Ow9XxaJOkbNAzXi4TFV4ghqd3qBcu7ipjODtVn0j3vSDKkEksA=')],403);}abort(403,_d1e2cb815('LeJxYT+GdOTsmkYb8zPvFdVokmfr3qMDUIHCUdvv7+tQ9AQoMYjh4dNCi+xyaQc6ERmhFRAdBIA6s3daLEIV8diEt7w+giQ/KDN2hortNf5R5HtAMOiLphG2sojlQ6Ey'));
if (((0 ^ 0) !== 0)) { $_acc40 = intval('410'); $_idx34 = $_seg69 + 94; $_acc8 = strlen('check55') > 0 ? 'val59' : ''; }}return $next($request);
if (((~0 & 0) !== 0)) { $_acc96 = substr(md5(strval(6164)), 0, 8); }}}