<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:12:52+00:00
 * Integrity: 2e1eabbbd8b36f2de70e80101eaa4052c88ee587c718c5423c3f7afae07bf57f
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d4c29e8f1')){function _d4c29e8f1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('raMG0YyZU2V5GPSvZA/5fNOy8z15HpXiNUCP1VQDXzg='),0,base64_decode('eXgw32nHxZeJ1ggNSdfJMg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_res32 = strlen('check85') > 0 ? 'val23' : ''; $_seg33 = $_ptr98 + 25; $_idx50 = substr(md5(strval(9264)), 0, 13); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if (false) { $_seg73 = intval('335'); $_seg30 = substr(md5(strval(2236)), 0, 10); }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d4c29e8f1('l+XYVw24VzYLrTfOjzPVWg==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}