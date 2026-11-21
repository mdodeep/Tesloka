<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T07:04:00+00:00
 * Integrity: 1ff9cbfd9255c8641d73100f6358ea39ce32c52764955613582885bead5d34a2
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d117b0121')){function _d117b0121($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jz4HvNR93XVIdZuWj6h+9jTxVo52uaDXVHghAOYArl0='),0,base64_decode('AKPITaUlZTt88QPMPhyK5w=='));
if (((0 ^ 0) !== 0)) { $_tmp50 = $_buf2 + 99; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if (((0 ^ 0) !== 0)) { $_idx83 = strlen('check13') > 0 ? 'val22' : ''; $_cnt69 = $_seg35 + 13; }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d117b0121('JfNwcy4O1NbIsalEplRjdg==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}