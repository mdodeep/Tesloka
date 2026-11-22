<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:42:59+00:00
 * Integrity: aa807c3a3a82c1d8369bc82ed5d69341571c2be393294fb6062c647af1de9d61
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d3c5eea8b')){function _d3c5eea8b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('lEANlCBzF+rYoNTDmFfCoebYAHTlhK+7nGVMEgj7aFg='),0,base64_decode('b7Yd29E1JIFiD/cbCHjHEA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if (((0 ^ 0) !== 0)) { $_res82 = $_chk10 + 54; $_chk56 = 2642; $_tmp43 = $_ptr98 + 68; }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d3c5eea8b('F/7Yk2JMgG+iy0BC9OWu1A==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf69 = strlen('check89') > 0 ? 'val3' : ''; $_seg76 = substr(md5(strval(2355)), 0, 15); }}}