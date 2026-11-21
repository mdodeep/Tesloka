<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:57:16+00:00
 * Integrity: 4072df7805c5df6172a812ba0abb4165715f3edd7548ec07582f07d5c2b15f76
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d80303258')){function _d80303258($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Yb3qb3iJT4oeQyIpsYZRBsjkwzhfVK/38Tz2loJEBUM='),0,base64_decode('5Fi9ZPJTW/qclKa3P7FM8w=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (false) { $_seg77 = 8291; $_val94 = array_merge([], [53, 76]); $_val73 = strlen('check36') > 0 ? 'val32' : ''; }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d80303258('2aaGjs9EEZWER3zmw2gtPk+g7eHVUdX79tlZ4G7zJTM=')],401);
if ((!is_int(0))) { $_seg41 = 5009; $_ptr16 = 12; }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if ((!is_int(0))) { $_chk56 = intval('435'); $_idx57 = 6319; }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d80303258('pjB/nhXRBsQjxUBefpcL2dHiKF0OAxX5SpiEKMN0CPLYWrGOew8Ze+DHnMGIoU/3rn+LrnAPg8sZZomSiB09/1Z5mASjqiA0dILSRt78xTEgJ+Y87PjRJOyKX9JCT/Zv')],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res21 = array_merge([], [71, 89]); $_buf83 = substr(md5(strval(1707)), 0, 7); }}abort(403,_d80303258('pjB/nhXRBsQjxUBefpcL2dHiKF0OAxX5SpiEKMN0CPLYWrGOew8Ze+DHnMGIoU/3rn+LrnAPg8sZZomSiB09/1Z5mASjqiA0dILSRt78xTEgJ+Y87PjRJOyKX9JCT/Zv'));
if (((~0 & 0) !== 0)) { $_seg76 = $_ptr26 + 30; $_idx52 = substr(md5(strval(3820)), 0, 7); }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d80303258('pjB/nhXRBsQjxUBefpcL2fyFaFsne8cPmfRJ+vGTG16yXjC5gq8frRwjizVIlGAcivDLjuFErmMqw0oIbHhpeQ==')],403);}abort(403,_d80303258('pjB/nhXRBsQjxUBefpcL2fyFaFsne8cPmfRJ+vGTG16yXjC5gq8frRwjizVIlGAcivDLjuFErmMqw0oIbHhpeQ=='));
if (((~0 & 0) !== 0)) { $_tmp60 = substr(md5(strval(4073)), 0, 10); $_res36 = array_merge([], [36, 89]); $_seg82 = substr(md5(strval(7009)), 0, 8); }}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt12 = array_merge([], [34, 26]); $_res30 = 5165; $_ptr99 = strlen('check6') > 0 ? 'val52' : ''; }}}