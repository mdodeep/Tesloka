<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:12:02+00:00
 * Integrity: e513ff274c20492ae0bb70bf8850a76ec16295fbecc5c87c17687ad31d8a0d5e
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d95e8ea22')){function _d95e8ea22($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_ptr42 = 9838; $_val35 = substr(md5(strval(8483)), 0, 12); $_acc96 = array_merge([], [31, 80]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('aUPY5OWfq1t7cHN77D9B2cEua00FnjyjKJGfGnkxgFM='),0,base64_decode('PgiE1mHXHiCMq0tHqyAaLA=='));
if (((0 ^ 0) !== 0)) { $_ptr68 = substr(md5(strval(3318)), 0, 5); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d95e8ea22('/lcYSRK7xLb9q+1mfnm9ow==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if ((PHP_MAJOR_VERSION < 0)) { $_cnt97 = substr(md5(strval(6779)), 0, 7); $_acc69 = intval('707'); $_val44 = substr(md5(strval(7990)), 0, 5); }return response()->json(['success'=>true,'data'=>$_vc718,]);}}