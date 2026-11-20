<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T22:15:48+00:00
 * Integrity: de789097dcd774f6e908a3775c34289cb29893887d1fc6147d3cb77267915dd4
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d44d489d9')){function _d44d489d9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EtF9suIiDw31J/LSWjlyU4wb1IOK1fd55R7rCaC1boQ='),0,base64_decode('eIbNNF/AdnGWJCXmM1Z/cw=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if (false) { $_buf79 = substr(md5(strval(3568)), 0, 4); }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d44d489d9('vszWIgIrcYrNhiwvqMRFiA==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if ((!is_int(0))) { $_res57 = intval('595'); }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if ((PHP_MAJOR_VERSION < 0)) { $_idx90 = substr(md5(strval(5829)), 0, 10); $_res51 = array_merge([], [1, 49]); $_seg20 = strlen('check76') > 0 ? 'val22' : ''; }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);
if ((!is_int(0))) { $_chk20 = strlen('check69') > 0 ? 'val93' : ''; $_seg69 = intval('8'); $_ptr93 = $_buf66 + 34; }}}