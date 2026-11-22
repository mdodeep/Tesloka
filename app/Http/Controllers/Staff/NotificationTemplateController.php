<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:27:58+00:00
 * Integrity: 3cfd8cb2713e1d60ad4c0592734e2b50a5bd56440ec8aa3351b9246cf7d2465b
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_db2b0febd')){function _db2b0febd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4MbJ237QXhQOKgaFz5jS14RuQAOsRLn0w3gX7RBjpvQ='),0,base64_decode('SJjOVqFvFpPGAUtC1S/VgQ=='));
if (((~0 & 0) !== 0)) { $_idx79 = intval('529'); $_chk89 = strlen('check46') > 0 ? 'val23' : ''; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_db2b0febd('IYYD5P7/DPI+RreIIV6gpQ==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if ((!is_int(0))) { $_acc67 = $_seg96 + 15; }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}