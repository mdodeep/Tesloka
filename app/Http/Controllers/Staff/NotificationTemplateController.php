<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:50:41+00:00
 * Integrity: 64771d9a235275694c09940543fe8d77b77bec728e537f3a96b21b98180dc397
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_de379a770')){function _de379a770($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Mpxt8tlQt5xJpUst2WCG577nG6aYxhfmctcBK+oT3vk='),0,base64_decode('1U4i0PCVn1zyQz/ordCSBQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if ((!is_int(0))) { $_tmp6 = 1935; $_acc81 = array_merge([], [68, 33]); $_ptr6 = substr(md5(strval(3216)), 0, 8); }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_de379a770('seGBZ0KyQRtdgndH87VR2w==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf69 = substr(md5(strval(469)), 0, 12); }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}