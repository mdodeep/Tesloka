<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:23:49+00:00
 * Integrity: 0fb7da579819f0745c6eb0036d75d2db29eb85d0f9e2bcc4e87b87537f884cbe
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d21c0e913')){function _d21c0e913($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr12 = strlen('check66') > 0 ? 'val15' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('bSKZh8UMDRB6Y/HfMExTSn1hkgzLimelzKles51ddso='),0,base64_decode('SibUy4O5yIAe+5W8X8azyA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d21c0e913('mdc6cegjbRYxrfm6gXBaJw==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx54 = array_merge([], [72, 38]); }$_v6033=$notificationTemplate->toArray();
if (((~0 & 0) !== 0)) { $_buf16 = substr(md5(strval(3469)), 0, 12); $_res24 = strlen('check52') > 0 ? 'val75' : ''; $_buf7 = substr(md5(strval(4123)), 0, 6); }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if (((~0 & 0) !== 0)) { $_chk81 = intval('808'); $_seg18 = 8513; }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if ((!is_int(0))) { $_idx70 = strlen('check47') > 0 ? 'val80' : ''; }return response()->json(['success'=>true,'data'=>$_vc718,]);
if (false) { $_cnt70 = intval('945'); }}}