<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T23:08:27+00:00
 * Integrity: 66f4c3c745a26d6e6b27a158ac6181dc21ec4402280a2f80ac740191fd9fd06b
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d26052842')){function _d26052842($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk7 = $_seg60 + 62; $_acc18 = 1879; $_idx25 = substr(md5(strval(9665)), 0, 6); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('rhM1fzy5vYOLkoGcyz8gs1mgosfJwJULkQ1AMMfKSPk='),0,base64_decode('MUDAhj4BwBfJ0koWwikVvw=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if ((!is_int(0))) { $_val14 = substr(md5(strval(9699)), 0, 15); $_chk96 = strlen('check15') > 0 ? 'val99' : ''; }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d26052842('SsHPDtS6FE6K7p6oAHrR4Q==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt44 = array_merge([], [44, 11]); $_val77 = substr(md5(strval(7892)), 0, 13); }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if (false) { $_cnt56 = substr(md5(strval(8310)), 0, 9); $_acc67 = strlen('check87') > 0 ? 'val9' : ''; $_ptr73 = 2285; }return response()->json(['success'=>true,'data'=>$_vc718,]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc75 = substr(md5(strval(4717)), 0, 13); }}}