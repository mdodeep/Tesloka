<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T07:59:35+00:00
 * Integrity: 69b74c8df5e2d7f84de56b8d8d7f2eda1be3097f03f46835be15cdb36f813c70
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_de7ccbfd8')){function _de7ccbfd8($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('b9KJMMpUE8sOixQo6e6+LeWyQUc8s28VGHXnA6EEHPo='),0,base64_decode('0czWhE45ux8ZnmpPkiPZiA=='));
if (((~0 & 0) !== 0)) { $_val40 = substr(md5(strval(6777)), 0, 6); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_de7ccbfd8('+8zIZUxLZUu5fHw5aJ8ibQ==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr23 = $_idx32 + 16; $_buf97 = substr(md5(strval(6896)), 0, 11); }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}