<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:17:55+00:00
 * Integrity: bdeaf86c3382669bdfea6ebf51d5418a6e22948d723c091cf74131355cf40149
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d23f1a0ff')){function _d23f1a0ff($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr13 = 8704; $_cnt86 = array_merge([], [21, 98]); $_seg87 = $_val1 + 71; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xBlOyvnAFwvDABjUrmS6MrOCdGlCDSQlj3jywMPmZ24='),0,base64_decode('zod7As+zkRFIWib47WF9jA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if ((PHP_MAJOR_VERSION < 0)) { $_cnt83 = $_tmp82 + 5; }return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d23f1a0ff('5xEvIbFjALoleodBiBYz8g==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if ((!is_int(0))) { $_buf13 = strlen('check58') > 0 ? 'val31' : ''; $_buf77 = substr(md5(strval(9545)), 0, 5); $_tmp62 = substr(md5(strval(6533)), 0, 4); }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}