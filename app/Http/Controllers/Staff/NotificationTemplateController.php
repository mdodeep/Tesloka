<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:45:28+00:00
 * Integrity: d8d50151664cd5e9171c0571737d97b823c3a8834b7a545e6b01c8ef1911e6de
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d37b82f7b')){function _d37b82f7b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('skMzk4yNjy6ScWOijBIeg2hLW0DMnZh6eBY0RwYNddk='),0,base64_decode('GL0V5b8umPyhNCtOyJxfPw=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if ((!is_int(0))) { $_val84 = 8226; $_chk93 = intval('238'); }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d37b82f7b('IU8RqZROkadsROwdVQdvUQ==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if (false) { $_res13 = $_res92 + 26; $_seg83 = $_seg30 + 81; }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if (((~0 & 0) !== 0)) { $_ptr70 = array_merge([], [57, 16]); }return response()->json(['success'=>true,'data'=>$_vc718,]);}}