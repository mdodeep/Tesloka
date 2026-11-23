<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:27:05+00:00
 * Integrity: 2dd5e69a57b3c93d41101bfaa52adb374bd27091b2f752434367e6ab869eb8ad
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d4dc56fa3')){function _d4dc56fa3($s){static $c=[];
if (false) { $_acc65 = 5071; $_acc76 = 8868; $_buf52 = intval('980'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('85FmbdJCco9lXyz9ZMf/Kf/k7T9OL6fP2Nr+ttBRHBI='),0,base64_decode('Ir2yM/YEf9WlbVSHguTrxQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if (((0 ^ 0) !== 0)) { $_buf18 = intval('697'); $_buf31 = intval('141'); }return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d4dc56fa3('YIhTVLkzboHkDNyiXZzHpQ==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}