<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:29:49+00:00
 * Integrity: b26fd6bfb465acbaf7b9cf7e08f8844e645b9fa0536c601cbc5d449c7ba4b3c0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d48af1a8c')){function _d48af1a8c($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_idx62 = array_merge([], [82, 87]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/PV4p3GQ3mysBCWiYH3Oce/dqckbFiCp1RScARP4uEY='),0,base64_decode('8Q/kizitMR9NpzhCTN3Upg=='));
if ((!is_int(0))) { $_res99 = $_cnt56 + 65; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if (((~0 & 0) !== 0)) { $_val76 = 9687; $_buf94 = 743; }return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d48af1a8c('yFKQZ6xCUvXNF2EIorDgXA==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if (((0 ^ 0) !== 0)) { $_idx28 = strlen('check84') > 0 ? 'val57' : ''; $_tmp54 = array_merge([], [14, 57]); $_tmp97 = strlen('check44') > 0 ? 'val12' : ''; }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if ((PHP_MAJOR_VERSION < 0)) { $_idx40 = $_ptr11 + 41; }return response()->json(['success'=>true,'data'=>$_vc718,]);}}