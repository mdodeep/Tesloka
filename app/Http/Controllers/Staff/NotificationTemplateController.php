<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:45:02+00:00
 * Integrity: cf98ba2c71528e9bdc17aab38b6f55c39eb3a0fed2e7bcd025c2730a723a9a14
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da3ac0dff')){function _da3ac0dff($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EPRsrOCK95t1dGVo8/5GpsoJNhmJAzegaLd+vgqAm8U='),0,base64_decode('jyF3sSrBd3yT95vG/Uehmg=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if (false) { $_buf94 = array_merge([], [54, 30]); $_acc26 = array_merge([], [15, 21]); $_idx85 = strlen('check82') > 0 ? 'val37' : ''; }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_da3ac0dff('H2D4F9hTARbPxqfIuMPCmQ==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if (false) { $_idx81 = intval('917'); }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}