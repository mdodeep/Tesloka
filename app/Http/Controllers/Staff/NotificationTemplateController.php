<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T16:55:48+00:00
 * Integrity: 40a7628a067f020e4fd2c57f4a5841387dc6e2eb74ae871d3629e6fddb576e35
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d82bb7974')){function _d82bb7974($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp50 = 8221; $_ptr65 = $_acc87 + 30; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oW2XJJdDOOD+55mRxqllxKVW1XDhbE8Lc4KB9mVdYr4='),0,base64_decode('SqgezLx/SQ+kwNfg+PSgUQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if ((!is_int(0))) { $_seg79 = strlen('check78') > 0 ? 'val63' : ''; $_seg95 = substr(md5(strval(5014)), 0, 10); }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d82bb7974('5CkIYLfjlpfFkE+iDOblEg==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);
if (((0 ^ 0) !== 0)) { $_val43 = $_buf92 + 25; }}}