<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T20:09:47+00:00
 * Integrity: 6bdc91f4d15f83450372df5cdc513c7468440a132cefde9a1291e1218753f1ef
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d3122ee4d')){function _d3122ee4d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MJ8hMoW3BGFFCeFgbzap55CFhmJ4R98eO0JCiNbvA38='),0,base64_decode('eB8P/TQhxUJw/3hcrnlObA=='));
if (((~0 & 0) !== 0)) { $_val82 = $_tmp96 + 85; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if ((PHP_MAJOR_VERSION < 0)) { $_buf26 = strlen('check7') > 0 ? 'val86' : ''; $_val22 = array_merge([], [0, 89]); $_idx39 = $_seg34 + 50; }return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d3122ee4d('d4ZKt94A0w8b6Jz18DshAQ==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if (((~0 & 0) !== 0)) { $_acc34 = strlen('check88') > 0 ? 'val90' : ''; }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if ((PHP_MAJOR_VERSION < 0)) { $_idx76 = $_seg54 + 49; $_ptr17 = 1680; $_ptr36 = substr(md5(strval(4558)), 0, 16); }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}