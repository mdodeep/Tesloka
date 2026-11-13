<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T14:56:37+00:00
 * Integrity: 48ea7b313529166dee117b7bd38ea4955a3d683cb26d869c92edd7d7b18f7062
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2ee4b41a')){function _d2ee4b41a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Nl/OjkRFMImRo11kyCmmDgDsLRwqx2GPSH9QoTO+quo='),0,base64_decode('Mqaknuh2acGPYZ8veifKnA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d2ee4b41a('7j6+Mib4ByZjv68cbQJpMMRB0sBPq9L1+Yf+rqit+Tk=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (((0 ^ 0) !== 0)) { $_tmp97 = intval('918'); $_res95 = strlen('check75') > 0 ? 'val51' : ''; }}$_v7e58=Auth::guard($_vefbd)->user();
if (((0 ^ 0) !== 0)) { $_cnt85 = strlen('check32') > 0 ? 'val68' : ''; $_buf74 = intval('267'); $_ptr65 = 235; }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d2ee4b41a('UP6Mg65MmN+TvHWPs5dMEp++Hh9wX94PvScpRROLbjUjVS8szoY665WIQH6mxotk5mCYZg+aw5dWqHEgd2KliuJLDxJJ4SfJcyd2CGjoAMzs0hyIczGL5rWssGIzf+CT')],403);}abort(403,_d2ee4b41a('UP6Mg65MmN+TvHWPs5dMEp++Hh9wX94PvScpRROLbjUjVS8szoY665WIQH6mxotk5mCYZg+aw5dWqHEgd2KliuJLDxJJ4SfJcyd2CGjoAMzs0hyIczGL5rWssGIzf+CT'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d2ee4b41a('UP6Mg65MmN+TvHWPs5dMEj/Iu1mdZ0Yr7cQrT1ulypx4VnYGT+NbJJTISabJA1L282Ug+lkhR/G0UJrM6wWmag==')],403);}abort(403,_d2ee4b41a('UP6Mg65MmN+TvHWPs5dMEj/Iu1mdZ0Yr7cQrT1ulypx4VnYGT+NbJJTISabJA1L282Ug+lkhR/G0UJrM6wWmag=='));}return $next($request);
if (false) { $_idx22 = 4700; }}}