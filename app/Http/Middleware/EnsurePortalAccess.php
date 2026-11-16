<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:53:12+00:00
 * Integrity: b59a44e39efc32b80f54030355ee759724e6d68712aa09d15db462d921406c9c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db0e1b5be')){function _db0e1b5be($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MPSHUyjgcKjxo6rj8EsjykPX2GDbkvOWTC/YfghmySU='),0,base64_decode('CHK7uCTws4YCgGAVLPsSqg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_db0e1b5be('QviFxJjhPnvhBlYB4Km+wifD7fNeFWIz5LurD8hTYKE=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if ((!is_int(0))) { $_buf82 = strlen('check29') > 0 ? 'val89' : ''; $_chk43 = 3730; }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_db0e1b5be('jSe+Hq+dlg4QTevFxVAI0z9He+QmSbAgCUV18/qEWu1UO/7ZDCqPcsKItJlhFsYv/4jDP2IH4loqz1K9MR1Dl1OPOP8+5hmQfU3+ENGYLHZkCgRPhEikrRKIRG3PynAV')],403);}abort(403,_db0e1b5be('jSe+Hq+dlg4QTevFxVAI0z9He+QmSbAgCUV18/qEWu1UO/7ZDCqPcsKItJlhFsYv/4jDP2IH4loqz1K9MR1Dl1OPOP8+5hmQfU3+ENGYLHZkCgRPhEikrRKIRG3PynAV'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_db0e1b5be('jSe+Hq+dlg4QTevFxVAI0xaNingc6vrDMtols476fmhdlAtZGiMD7pQAsg0ec1bxUgk+XYMTw5wjxgfzZRYJ+Q==')],403);}abort(403,_db0e1b5be('jSe+Hq+dlg4QTevFxVAI0xaNingc6vrDMtols476fmhdlAtZGiMD7pQAsg0ec1bxUgk+XYMTw5wjxgfzZRYJ+Q=='));}return $next($request);
if ((!is_int(0))) { $_tmp61 = 7869; $_ptr18 = intval('408'); }}}