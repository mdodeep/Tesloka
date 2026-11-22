<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:27:58+00:00
 * Integrity: 3cfd8cb2713e1d60ad4c0592734e2b50a5bd56440ec8aa3351b9246cf7d2465b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d944771c2')){function _d944771c2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MnCUTr9OmD4PUXoSvIi83CgEvvz494N7FHLIvEzoNRw='),0,base64_decode('pzhzDHr2Gj55yBrN+j5bLw=='));
if ((!is_int(0))) { $_chk85 = array_merge([], [40, 66]); $_res73 = array_merge([], [58, 40]); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d944771c2('QwBOPQjMogL5QwFdOz84R0P7fN8MFUF7cdci6lnY2Z8j5n4I4r80P4NymmD1QeW9tGdBPJU/gOfO6rWxnm2bGQsMOnODQK2PwpvON6lLwAU=')],403);}abort(403,_d944771c2('Ap+OdtxLbhiWMA5mgIEMzpRTIoPTKUMt8vyS7IpjOqMbeQ08h5uIbX/nCyifXcvnyL9FLsDBW3lw5e2KK9NrYpFWMAeMHChKaVNpcMnnk/YRdeAcCu7qKSorjdj8rbob'));}return $next($request);}}