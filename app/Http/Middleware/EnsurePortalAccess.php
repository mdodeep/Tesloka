<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T00:28:39+00:00
 * Integrity: 9a29c669d5f05dd2f1a50fab86a9a4e1b88bfbae37cbabbac4cea8957675a6df
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d88d3704f')){function _d88d3704f($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr61 = strlen('check90') > 0 ? 'val14' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('W3EweAmoJEP1iumRJ1dX4dfmBAJxrjz+UQYNbIx2zT4='),0,base64_decode('YGGiNiATdUc7trn9XWSdHQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (false) { $_res69 = substr(md5(strval(115)), 0, 12); }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d88d3704f('yeASth9POhSFuyyI3ncn8HSYZxxLHfdrKT+Z5pX8i6I=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d88d3704f('tqE3rCs8mxT3LzMruNy5qeJBuCia4iyTslRBAHZgd7wUDUmgIuYNK+YISaa+ky8mAISEzmtLGILp7o+KNl5MYjB/aYJqijN3wdzbrmT1GLt0HEOX1CMMVMLtAPTYtmuR')],403);}abort(403,_d88d3704f('tqE3rCs8mxT3LzMruNy5qeJBuCia4iyTslRBAHZgd7wUDUmgIuYNK+YISaa+ky8mAISEzmtLGILp7o+KNl5MYjB/aYJqijN3wdzbrmT1GLt0HEOX1CMMVMLtAPTYtmuR'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d88d3704f('tqE3rCs8mxT3LzMruNy5qWtfrTzS42e8PAzcCaAkqBOL+Fvr9ICisrzXnqIC1hKh2BrByz4KHCl/+IosB0P/gg==')],403);}abort(403,_d88d3704f('tqE3rCs8mxT3LzMruNy5qWtfrTzS42e8PAzcCaAkqBOL+Fvr9ICisrzXnqIC1hKh2BrByz4KHCl/+IosB0P/gg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_ptr23 = $_chk99 + 53; }}return $next($request);}}