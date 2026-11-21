<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:07:22+00:00
 * Integrity: 960c70a1e7cf94b1588365231191a61d56d4ab7f78261933e335dba285b1de5c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d5b61d7cb')){function _d5b61d7cb($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6b3al/qj/+jWPLpxnx3A4YeOKUuVjYtdx441r6V0QYk='),0,base64_decode('xUSgUhVkKZJ/DeOyivNQ+Q=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if (((~0 & 0) !== 0)) { $_chk45 = $_buf92 + 39; $_seg43 = substr(md5(strval(3437)), 0, 15); $_res79 = substr(md5(strval(4279)), 0, 14); }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d5b61d7cb('QbA/uaXrFUU9mG1nVPMpFg==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if (((~0 & 0) !== 0)) { $_val63 = 452; $_acc16 = intval('210'); }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);
if (((~0 & 0) !== 0)) { $_seg60 = substr(md5(strval(6114)), 0, 7); $_tmp33 = substr(md5(strval(3815)), 0, 11); $_seg57 = 7355; }}}