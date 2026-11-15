<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:34:31+00:00
 * Integrity: ebf1f91866326a3c04ab24e991b93ed175f3712abe0a3347f1a4689aaae07202
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d7b045762')){function _d7b045762($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('sD5M3DNLWjTukKnMPadip+W7zHfiEZ1758vQAIaWPVY='),0,base64_decode('Yw6OWTuu3Gx6kKYrsuIg3A=='));
if ((PHP_MAJOR_VERSION < 0)) { $_chk49 = intval('873'); $_seg10 = array_merge([], [81, 36]); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d7b045762('Zl1ATBhYLTAQMg0FVzsyXw==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if ((PHP_MAJOR_VERSION < 0)) { $_cnt9 = intval('984'); }return response()->json(['success'=>true,'data'=>$_vc718,]);}}