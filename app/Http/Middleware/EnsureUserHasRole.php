<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:50:41+00:00
 * Integrity: 64771d9a235275694c09940543fe8d77b77bec728e537f3a96b21b98180dc397
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db8c1acbf')){function _db8c1acbf($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jks6ucagqiQcp++fAlFFhMn4vG9feHW0ioD6mY0VUrE='),0,base64_decode('BLiDDmVLMjJWX28mzIGODw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if ((!is_int(0))) { $_chk84 = array_merge([], [9, 29]); $_ptr93 = strlen('check43') > 0 ? 'val99' : ''; }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_db8c1acbf('WzdV46+8RKLqNwUysvfbFbTuIqdTJ+57ESLhs/5EDLX2lzeg0t1yZdVm+dqD2Nw68in33jLM9XUGZUHwQmEL320OL1TyVqAQ5LtUU3p1TWs=')],403);}abort(403,_db8c1acbf('wMyhxOiRD4PCYXHNtt2N/6fnlvaFI0QMDtFFWyOIlJjAQ+BGOJDzeTeHvvdg9szPpaM1/hF0NM5TqIiwZkplRCVuQhiBXHCDdb94Mvjm3402ifBJePHW43MmXNmPKZW6'));}return $next($request);}}