<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:50:06+00:00
 * Integrity: 6fee3fd511e40e63d81a3969f04fe7438d544c4954970045fffff7363671dd5e
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d26bb5e08')){function _d26bb5e08($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vjyMsElQgn9u2G0mE/1NZX7y0tLaWlEkE3jt7i1OtsA='),0,base64_decode('d5kziidJsJQXwamsARV+cw=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr37 = 3859; }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d26bb5e08('SMyYLxBHmigRtXNxdrYsPA==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if (((0 ^ 0) !== 0)) { $_tmp72 = $_buf84 + 54; $_buf65 = strlen('check80') > 0 ? 'val40' : ''; $_cnt21 = substr(md5(strval(2118)), 0, 8); }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if (false) { $_idx69 = intval('477'); $_seg47 = substr(md5(strval(7093)), 0, 10); }return response()->json(['success'=>true,'data'=>$_vc718,]);}}