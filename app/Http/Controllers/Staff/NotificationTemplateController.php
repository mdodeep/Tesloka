<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T17:23:07+00:00
 * Integrity: 6257913a8058ab37f849ade4e0e882bb7abc5dd484c35a27bbda9f73d24f4594
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d16eb3d4e')){function _d16eb3d4e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('nW9LT7m01UuMh11ofCP9MmgjZqU3weMm7eSZHcQCn/c='),0,base64_decode('DlqvaLei2vidcIybmmbJnA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if ((PHP_MAJOR_VERSION < 0)) { $_ptr47 = array_merge([], [79, 80]); }return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d16eb3d4e('evdKHe2VKPSCCjD3JKr/Ww==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if ((!is_int(0))) { $_buf77 = substr(md5(strval(8131)), 0, 11); $_buf83 = intval('298'); $_tmp30 = array_merge([], [89, 41]); }return response()->json(['success'=>true,'data'=>$_vc718,]);}}