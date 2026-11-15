<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:18:26+00:00
 * Integrity: 3ddb70f39474a65d6f1e659715367dfdc86ba7125b0cb12cfc1c6446c744b981
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d32cd24c4')){function _d32cd24c4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('GaEpYgWH660cCl/PnIM/f+8aU8EUV2NTW7WXHF83Ayg='),0,base64_decode('FI+0FoH/kEPTpKSDSDQN4A=='));
if (false) { $_val40 = 827; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d32cd24c4('bjv+ij8mMXQwNULX0d444g4h2yneY6KTQrGP9Ap7Wvc=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d32cd24c4('YXI3V7HnvUd8Z1euMHlLkHJyVx+Q9XkIGlPs8av2QjPXS8u+3d/QmIlKpxVC+xPfx1FbnoKf0Jj6SP6mrOzNxai78IjDBnSGMcxqp1PQh/+crbYDYxkd20cYX7J5OmyZ')],403);}abort(403,_d32cd24c4('YXI3V7HnvUd8Z1euMHlLkHJyVx+Q9XkIGlPs8av2QjPXS8u+3d/QmIlKpxVC+xPfx1FbnoKf0Jj6SP6mrOzNxai78IjDBnSGMcxqp1PQh/+crbYDYxkd20cYX7J5OmyZ'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d32cd24c4('YXI3V7HnvUd8Z1euMHlLkCCz3vfl9GoyYrUhDDo+14JFTd2pLanqg4ekrFQ+OZb+WTl/8T4j70tXmGYTeStEOg==')],403);}abort(403,_d32cd24c4('YXI3V7HnvUd8Z1euMHlLkCCz3vfl9GoyYrUhDDo+14JFTd2pLanqg4ekrFQ+OZb+WTl/8T4j70tXmGYTeStEOg=='));}return $next($request);
if (((0 ^ 0) !== 0)) { $_seg34 = intval('10'); $_chk55 = $_chk82 + 11; }}}