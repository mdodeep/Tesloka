<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T10:25:07+00:00
 * Integrity: ed995c81e28fa02e1a6f329ac1d5ad5603084540759db7883a3c60a32583f05c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd5afe488')){function _dd5afe488($s){static $c=[];
if (((~0 & 0) !== 0)) { $_ptr12 = 269; $_idx0 = $_acc8 + 79; $_tmp33 = intval('560'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('07Z0/LHRnt4s1VlAs+6YLLMsuP0Bcvt8GKzc8uPEOXo='),0,base64_decode('13B3ZDksaRNSt5FQ2K5DNQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',compact('templates'));}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_dd5afe488('ZajTc1tbH0LvJ8u9NFDJ3A==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (((~0 & 0) !== 0)) { $_val34 = $_chk8 + 19; $_acc34 = array_merge([], [5, 97]); $_acc32 = array_merge([], [4, 76]); }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx29 = $_idx4 + 78; $_res16 = $_res47 + 32; $_res1 = strlen('check72') > 0 ? 'val9' : ''; }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}