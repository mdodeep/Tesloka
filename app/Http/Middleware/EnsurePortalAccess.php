<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T17:59:52+00:00
 * Integrity: 9df5056a5d0327a6d22531800b27a86c8ded9177e82f9d7bf52136d59d871c1e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d99ef994f')){function _d99ef994f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('I1j/1ppAsQEZplSRcS5GZww705pyRW7YuoSLFsNKD3Y='),0,base64_decode('gT3kIKEobXxaJvLzuSBKAg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d99ef994f('7ViB6mkeTf3p6sDYDwtmMoUKBcBxnx0BS/cIQHEuKKs=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d99ef994f('iCR0Y43qrsYygdy/rSbFrcEXjo4+LVuK/qcaBBK9ZHVfPYnZ26ktAk4G6qe8UcEl9tJq72QdwbOeHoUo8hAoQTZYiLc2JM8gcFJQZngFEV8HephcXzhKMeS+AP6fv6P4')],403);}abort(403,_d99ef994f('iCR0Y43qrsYygdy/rSbFrcEXjo4+LVuK/qcaBBK9ZHVfPYnZ26ktAk4G6qe8UcEl9tJq72QdwbOeHoUo8hAoQTZYiLc2JM8gcFJQZngFEV8HephcXzhKMeS+AP6fv6P4'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d99ef994f('iCR0Y43qrsYygdy/rSbFret2iIjfNUlyU9+XX/v2jWZ4BRSxQftY9aD2trpr5Oojg6qtTmkmqQrazZThouKDpw==')],403);}abort(403,_d99ef994f('iCR0Y43qrsYygdy/rSbFret2iIjfNUlyU9+XX/v2jWZ4BRSxQftY9aD2trpr5Oojg6qtTmkmqQrazZThouKDpw=='));
if ((!is_int(0))) { $_tmp70 = $_res73 + 97; $_acc51 = 2552; }}return $next($request);}}