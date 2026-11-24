<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:17:28+00:00
 * Integrity: ed8b565e1edef211c5fa6f9829f20d71415ab4523273c2e6ae9eb520179c1bf5
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d6b4b1cbb')){function _d6b4b1cbb($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XtJtL/hHH2lH3QeCYwyZdbhp4GyH8No2/uE6yB3L7K0='),0,base64_decode('JAB9JeSJdL1rUbbWd5lNlA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if (((0 ^ 0) !== 0)) { $_idx54 = array_merge([], [38, 22]); $_idx87 = array_merge([], [87, 62]); $_val25 = substr(md5(strval(7436)), 0, 5); }return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d6b4b1cbb('3qjLg7S5OpEnxjnSW8zHmw==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if (false) { $_val11 = $_val59 + 54; }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);
if (((0 ^ 0) !== 0)) { $_chk71 = 2332; $_idx97 = $_acc33 + 14; $_buf74 = $_seg73 + 14; }}}