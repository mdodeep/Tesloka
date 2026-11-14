<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:24:07+00:00
 * Integrity: 3f389135bae9bc9d8687dd0a86e767fd91c57a5c6dc1ad9f62845c658358687c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d0800a9d1')){function _d0800a9d1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('P3TMcKOVpEPejWzU/B+HSNgrdbV2YGJjfkgRiLx29Rc='),0,base64_decode('+SM2q/9nxR6RBkFxxsR8Uw=='));
if (false) { $_chk28 = substr(md5(strval(4454)), 0, 5); $_buf48 = intval('888'); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp82 = 9102; $_tmp33 = 2816; }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d0800a9d1('5A6bzufyEW7gQeRtV5EMug==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if ((PHP_MAJOR_VERSION < 0)) { $_val74 = intval('743'); $_res34 = substr(md5(strval(6992)), 0, 7); $_cnt26 = $_acc10 + 76; }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}