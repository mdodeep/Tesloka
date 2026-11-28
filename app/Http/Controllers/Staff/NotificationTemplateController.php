<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T03:05:08+00:00
 * Integrity: 25688b6170e974b3a8060ace7aeff48f9488f7f7100c49aadc732205d7f8c83a
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d5e0cddc1')){function _d5e0cddc1($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_cnt66 = $_chk62 + 29; $_idx20 = 5527; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('lWordwtxM4A592bZhJDPrMMVpM0iqLOmEFh56FBcH3c='),0,base64_decode('iqE57LMSNyJVKm+/ZJrVHA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use App\Services\HtmlSanitizerService;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if (((~0 & 0) !== 0)) { $_tmp30 = strlen('check13') > 0 ? 'val3' : ''; $_buf90 = array_merge([], [51, 92]); }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d5e0cddc1('agbsWghg+E2qyIGfkSCg+A==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if ((PHP_MAJOR_VERSION < 0)) { $_val22 = 7686; $_acc20 = strlen('check89') > 0 ? 'val32' : ''; $_ptr28 = strlen('check96') > 0 ? 'val45' : ''; }$_va1ec=HtmlSanitizerService::clean($_vd08b['body_template'],false);$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_va1ec,'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_v77fb=$request->input('body_template');$_v6dd2=$_v77fb!==null?HtmlSanitizerService::clean((string)$_v77fb,false):null;$_vd9be=$notificationTemplate->renderPreview($request->input('subject'),$_v6dd2);return response()->json(['success'=>true,'data'=>$_vd9be,]);}}