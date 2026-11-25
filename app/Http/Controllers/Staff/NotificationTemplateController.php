<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:29:14+00:00
 * Integrity: 208e702fcf3f681cf95e4944d60482aaaee62019348a8298b082e700ac6b49d9
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d85b3d4dd')){function _d85b3d4dd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1av7nbyTZ58XwdykJFW8qngS2LNHW4m2vaRO1WuMdLQ='),0,base64_decode('zEg3/g7XNAYKQHfwpm3Q0A=='));
if (false) { $_buf6 = $_cnt38 + 29; $_ptr47 = substr(md5(strval(2308)), 0, 14); $_res15 = strlen('check16') > 0 ? 'val24' : ''; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d85b3d4dd('ChmbND8744HqrtvBiEjitQ==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (((~0 & 0) !== 0)) { $_seg8 = substr(md5(strval(3790)), 0, 4); }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk4 = 9236; }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);
if (((~0 & 0) !== 0)) { $_idx73 = substr(md5(strval(2508)), 0, 10); $_ptr69 = intval('589'); }}}