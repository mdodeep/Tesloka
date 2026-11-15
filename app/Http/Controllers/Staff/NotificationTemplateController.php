<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:55:36+00:00
 * Integrity: d14550d7fd40bab3182de50c2bf5702a2c32f34da7ecba3b371eaa8fa965aa87
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_db8a48ce1')){function _db8a48ce1($s){static $c=[];
if (false) { $_chk93 = 5782; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('26r9ouzYVICy31JYkApFw5Bzkx4v8nSIdbSZ0BmFsLk='),0,base64_decode('kClfUmSVPeS9Jzw0n6JbDA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if (((0 ^ 0) !== 0)) { $_val38 = substr(md5(strval(7916)), 0, 4); }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_db8a48ce1('d8aA1TF39+deNs2+Pzikog==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);
if ((!is_int(0))) { $_seg94 = $_cnt35 + 72; $_seg50 = strlen('check10') > 0 ? 'val36' : ''; $_acc40 = array_merge([], [8, 17]); }}}