<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:06:06+00:00
 * Integrity: 9469bd68ed4c2adc76efee84baf6c826c30ba97ba055fcde4818add4db0214ad
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d0200911e')){function _d0200911e($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_val12 = $_cnt63 + 18; $_tmp73 = array_merge([], [8, 24]); $_chk78 = 2789; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wExqhswnN0YWwCQdURMYDnjRi99SZ+mMPFOJV4Q9Z3g='),0,base64_decode('AQ5sto7148EKH5mkKcZpnA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d0200911e('T5yzFRuBKhColcuZQiQenA==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if ((!is_int(0))) { $_seg28 = 3496; $_chk62 = substr(md5(strval(158)), 0, 15); $_val81 = 8486; }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val3 = $_res81 + 24; }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}