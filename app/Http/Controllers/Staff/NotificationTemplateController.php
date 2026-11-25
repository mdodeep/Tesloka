<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T00:24:13+00:00
 * Integrity: 92a023b21823ec6b9767d02e7dd47cf16a2411cafd7ff2ec8d0e775dd40aba8b
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d84e44ac2')){function _d84e44ac2($s){static $c=[];
if (false) { $_chk55 = intval('918'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1TdEwh6UXV4Rt7b2f83btOOwmIF8GsfW2AHMU/uO1UA='),0,base64_decode('OuisLrCRRiiWWrnwHERI8g=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d84e44ac2('mvp2LT50XpIyrjHZ50Q/gQ==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (false) { $_seg12 = $_val96 + 13; $_res57 = substr(md5(strval(8062)), 0, 7); $_ptr71 = 6617; }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr8 = $_chk15 + 41; $_tmp61 = strlen('check85') > 0 ? 'val76' : ''; }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp86 = substr(md5(strval(1245)), 0, 15); $_seg38 = intval('399'); $_idx53 = intval('77'); }return response()->json(['success'=>true,'data'=>$_vc718,]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk93 = substr(md5(strval(7730)), 0, 15); $_val26 = substr(md5(strval(7949)), 0, 7); }}}