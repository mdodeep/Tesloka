<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:45:01+00:00
 * Integrity: b940e2dc30758fd76afa973e85cb082e1fd61410b030bafe5189b3fcbd3e2669
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d8af7d15e')){function _d8af7d15e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8HEOHbJhuK1JhnXzva0zfIcE3EstOqgBM7KqSSqJGrY='),0,base64_decode('9TOIYgAVtpE69u8BcaqXlQ=='));
if ((!is_int(0))) { $_ptr49 = strlen('check20') > 0 ? 'val32' : ''; $_cnt60 = strlen('check94') > 0 ? 'val84' : ''; $_chk53 = substr(md5(strval(1406)), 0, 10); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if (false) { $_res68 = substr(md5(strval(7981)), 0, 14); $_idx88 = strlen('check27') > 0 ? 'val48' : ''; }return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d8af7d15e('QMEMr6jeaPR3dfqmQO0ZTA==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}