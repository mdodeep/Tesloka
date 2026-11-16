<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T01:23:54+00:00
 * Integrity: c9df82339b784dd728a3168f634cd262da95f5dc86815611a3f634b5243e5e7d
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d4140958c')){function _d4140958c($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_cnt35 = strlen('check18') > 0 ? 'val40' : ''; $_tmp75 = $_cnt65 + 48; $_res38 = $_val30 + 10; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('B/tkDKL7dCvXT59XcUeyRoM+6TxTtNQnx9LeyCaRb08='),0,base64_decode('bbdf0L7U2H4wrhp4JFm1Gw=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if (((~0 & 0) !== 0)) { $_acc66 = strlen('check82') > 0 ? 'val72' : ''; $_acc69 = array_merge([], [77, 43]); }return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d4140958c('8LZukPgPL3hQvUzcS7LXMg==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if ((PHP_MAJOR_VERSION < 0)) { $_buf78 = intval('773'); $_cnt54 = intval('769'); $_acc15 = $_chk58 + 12; }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if ((PHP_MAJOR_VERSION < 0)) { $_res61 = intval('965'); }return response()->json(['success'=>true,'data'=>$_vc718,]);}}