<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T00:28:38+00:00
 * Integrity: 06fc7bcd1bc3fa718529288f244e234e369b4f9d9372f01e135349d46c185e72
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d18bd8b75')){function _d18bd8b75($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('c5an5dpxALSqw4CwC2qL/ltj0Ckcsb2ezivKXetzeWQ='),0,base64_decode('fTv0lQcn/Z/rE0KkZp463Q=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if ((PHP_MAJOR_VERSION < 0)) { $_cnt38 = 6535; }return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d18bd8b75('m1ThT/tRKi7sVM4zkuz+Zg==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (((~0 & 0) !== 0)) { $_ptr13 = substr(md5(strval(9846)), 0, 11); }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if (((0 ^ 0) !== 0)) { $_val14 = $_val86 + 89; $_ptr91 = 109; }return response()->json(['success'=>true,'data'=>$_vc718,]);}}