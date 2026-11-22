<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T17:59:52+00:00
 * Integrity: 9df5056a5d0327a6d22531800b27a86c8ded9177e82f9d7bf52136d59d871c1e
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_de4f7cd0e')){function _de4f7cd0e($s){static $c=[];
if (((~0 & 0) !== 0)) { $_idx30 = 8066; $_seg44 = $_seg35 + 40; $_tmp94 = array_merge([], [6, 9]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('za6TpmqDvihMyNpp/zMXA4qM4ogeMqVuWEUTXMLvMV8='),0,base64_decode('tLtixOEBL8wXaHAvCXj64w=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_de4f7cd0e('KhD4Rg0xXNhF99wfcSqNVw==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (false) { $_buf15 = substr(md5(strval(5297)), 0, 10); $_ptr80 = $_val72 + 79; }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}