<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T10:44:49+00:00
 * Integrity: 0617fe45b49cd5d031a22b03bf5ebd8f1d93ffe50a9543382cbcd3000291716c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd2d7c03d')){function _dd2d7c03d($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_chk6 = substr(md5(strval(1931)), 0, 4); $_chk75 = $_res9 + 56; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ub3hDUss853Hhb1qxlIqYCeI442wEQrE4BHbAmQhZcM='),0,base64_decode('mA0fY+Mp3sDVejx2XxXfOQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if (((0 ^ 0) !== 0)) { $_cnt98 = array_merge([], [8, 5]); $_val13 = array_merge([], [66, 64]); }return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_dd2d7c03d('JRthMKVhXFh7tuqj2Lmz8Q==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc9 = strlen('check87') > 0 ? 'val84' : ''; $_val13 = array_merge([], [77, 99]); $_acc72 = array_merge([], [31, 52]); }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if ((!is_int(0))) { $_chk83 = array_merge([], [57, 87]); $_ptr91 = intval('909'); }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}