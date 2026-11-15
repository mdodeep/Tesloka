<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:22:47+00:00
 * Integrity: 103d18971ce7736827021cff41c8eb2aba5d97fad58112dd804a3e04cca16207
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d4fc24fa0')){function _d4fc24fa0($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XfQwpgGZhxhra6XFEtebMCRIBIr/ie0VW40Qq2c4LC0='),0,base64_decode('EIN02ttCpA8V8UvDl5mPzw=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if (((0 ^ 0) !== 0)) { $_idx49 = strlen('check58') > 0 ? 'val27' : ''; $_acc98 = intval('517'); $_idx15 = substr(md5(strval(2624)), 0, 6); }return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if (((~0 & 0) !== 0)) { $_ptr71 = intval('847'); $_ptr20 = intval('481'); $_idx47 = intval('481'); }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d4fc24fa0('45tLr4hi1S6FHevjeR8gbA==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}