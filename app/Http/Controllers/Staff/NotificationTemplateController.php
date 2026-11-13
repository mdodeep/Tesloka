<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T14:56:37+00:00
 * Integrity: 48ea7b313529166dee117b7bd38ea4955a3d683cb26d869c92edd7d7b18f7062
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d8444e5ea')){function _d8444e5ea($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('habwhfb63HMP7f7AxB4mf0DzXZldqgVUHUaTBKv3NMo='),0,base64_decode('nvYoxIqjb9Zm7nvAaudeOw=='));
if (((~0 & 0) !== 0)) { $_res25 = intval('246'); $_idx49 = $_chk7 + 91; $_cnt54 = substr(md5(strval(7962)), 0, 5); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if (((0 ^ 0) !== 0)) { $_cnt16 = $_buf29 + 89; $_val22 = array_merge([], [38, 74]); $_acc32 = $_tmp70 + 40; }return view('staff.settings.notification-templates',compact('templates'));}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d8444e5ea('nkXmdV1ot5JDoMH/YM/8NQ==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if (((0 ^ 0) !== 0)) { $_res11 = strlen('check18') > 0 ? 'val32' : ''; $_buf33 = intval('741'); $_acc7 = array_merge([], [64, 70]); }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}