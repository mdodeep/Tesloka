<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:15:06+00:00
 * Integrity: c9d7966c24fe3fa93e867919c540843af66add96af41be40323cc35363442315
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d646319bf')){function _d646319bf($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp83 = strlen('check32') > 0 ? 'val91' : ''; $_idx13 = array_merge([], [59, 23]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('y6KHVJbLC5PiTQat6K1Sr7Z7qH9OZJ40rYrfi1MQHxk='),0,base64_decode('gj38gXcGhICtId9ep8s/sw=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if ((!is_int(0))) { $_buf75 = substr(md5(strval(67)), 0, 16); $_tmp47 = 479; $_seg24 = $_res23 + 84; }return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d646319bf('SHCSmM6NcIHA1sEqrk6Elg==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if ((!is_int(0))) { $_ptr75 = array_merge([], [88, 30]); $_val20 = $_tmp95 + 29; }return response()->json(['success'=>true,'data'=>$_vc718,]);}}