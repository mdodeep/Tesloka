<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:00:39+00:00
 * Integrity: 3bad3d4fa11dee0cfe1ada07762cbe00c63a79c37c90885345211f475742f7f8
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d80796561')){function _d80796561($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('R8R9Un0uvOR/Oi0cRnrwE6jzt+MhZ566YMuHBTzL6b0='),0,base64_decode('EWgFe1UW/xqYXwUr1sINrA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if ((!is_int(0))) { $_res83 = 4802; $_seg7 = 1655; }return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d80796561('dJ2Ng/cL/8eQ4CHI30Cz1A==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if (((0 ^ 0) !== 0)) { $_tmp97 = strlen('check89') > 0 ? 'val61' : ''; $_res6 = $_res76 + 78; }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if (false) { $_val45 = intval('149'); $_buf14 = strlen('check12') > 0 ? 'val50' : ''; }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}