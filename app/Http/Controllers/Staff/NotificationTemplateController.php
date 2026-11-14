<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:52:38+00:00
 * Integrity: eadc6442d4fdd2339d9bc04da764d8508c87f15e258bda115d098f4364551fe1
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd69835d4')){function _dd69835d4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('S676PQyjF/WuqtKXqUkhArfV/s83fA2fOGXO7DQV0Xs='),0,base64_decode('bHrzGoGTWOkjj9xPKd7NPg=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_dd69835d4('uDUGH+/X7lqxarcbNfZo3g==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk95 = array_merge([], [86, 2]); $_val62 = intval('242'); $_idx65 = 4533; }$_v6033=$notificationTemplate->toArray();
if ((PHP_MAJOR_VERSION < 0)) { $_seg42 = intval('533'); $_cnt64 = intval('834'); $_idx74 = strlen('check18') > 0 ? 'val75' : ''; }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if (((~0 & 0) !== 0)) { $_res7 = substr(md5(strval(4545)), 0, 4); $_chk91 = substr(md5(strval(5055)), 0, 11); $_seg68 = $_tmp57 + 32; }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}