<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T03:52:05+00:00
 * Integrity: d3638726e9f78ca54b5961d6f09ea75b73a24fcc350e33faa5859d80a3ad41dd
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d0bc9c366')){function _d0bc9c366($s){static $c=[];
if (((~0 & 0) !== 0)) { $_buf44 = strlen('check94') > 0 ? 'val9' : ''; $_res23 = $_cnt89 + 65; $_res90 = 8257; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4u8c763bGD9LTXIhMTAym+enPZ7gGgix0VXELy24lIs='),0,base64_decode('8sFbWXjeIlOXZ3ZOUetm5g=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if (((~0 & 0) !== 0)) { $_val51 = 8823; }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d0bc9c366('k7K2orHyFT3LUfqC5pPPOw==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if ((!is_int(0))) { $_idx77 = strlen('check99') > 0 ? 'val94' : ''; $_idx78 = array_merge([], [32, 37]); $_tmp33 = intval('578'); }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if (false) { $_ptr1 = intval('394'); }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}