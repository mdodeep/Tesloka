<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:23:31+00:00
 * Integrity: 0fc568f4ba4da30bba9c07ba10466fcbbd923ab1e1fb4a8258d0fef9ced27354
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d45dcc06f')){function _d45dcc06f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('iuiCHvKzYVTld9gfS6qS8zsf47mw8cNM0if612cGNuQ='),0,base64_decode('7AeY3hO6qv7Egfke8atGFQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d45dcc06f('nDAYkjOCQwi6d1/Uaq+Rqw==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if (false) { $_val54 = strlen('check78') > 0 ? 'val53' : ''; $_buf0 = substr(md5(strval(1641)), 0, 10); $_buf37 = $_buf87 + 60; }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);
if (((~0 & 0) !== 0)) { $_chk55 = $_idx23 + 34; $_cnt42 = array_merge([], [74, 94]); }}}