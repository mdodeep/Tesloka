<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:40:28+00:00
 * Integrity: d8afa62270f139dce3d4ed0f9766ada15192a183d4abdb06565216c2901cb57a
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dc985a12d')){function _dc985a12d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2l2VJq5dzFeGxr9Z2Fr34J7LKWEmZ7A4eUL0J6UAjEA='),0,base64_decode('dAEWRf3WaGabR822yD+s/w=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_dc985a12d('Q9mO5CtIcSwTF9fwCA9r4Q==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp37 = 3604; $_val18 = $_cnt51 + 6; }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if ((!is_int(0))) { $_ptr19 = 7614; $_buf42 = $_seg55 + 12; }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}