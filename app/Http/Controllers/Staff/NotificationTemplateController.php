<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T05:03:50+00:00
 * Integrity: 37cbfbbffc221300fc04fef8ca626ac3f988786c36f9165a993a6883a951d125
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dbcc69431')){function _dbcc69431($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('yc6nQ4lbyYgQGPqFnvs/PdC8LS8vN7UPcrYnelYJWxI='),0,base64_decode('Xz0lNc0rbWtZzBPOwx5N3A=='));
if (false) { $_ptr4 = $_idx53 + 11; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_dbcc69431('pAz2oy422nx6i2NJUt1v8w==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if ((PHP_MAJOR_VERSION < 0)) { $_acc16 = substr(md5(strval(5363)), 0, 11); }return response()->json(['success'=>true,'data'=>$_vc718,]);}}