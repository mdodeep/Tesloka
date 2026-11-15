<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:03:53+00:00
 * Integrity: 72d6c2a8f55830d6dde7c4fc6854949f9ed50a91f2785841c39a708f3a0fa05c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_defa94fc6')){function _defa94fc6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7COE3jYp3l2EqvQ1B9k+u3uRNVWbstNx+j2Uv06OUV8='),0,base64_decode('jTFM50zyjKurzuB443cqhw=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_defa94fc6('VEpvZivICAOO1lqFlEN58Q==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if ((PHP_MAJOR_VERSION < 0)) { $_acc80 = $_ptr67 + 75; $_buf49 = array_merge([], [51, 15]); $_chk83 = $_cnt23 + 61; }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if (((~0 & 0) !== 0)) { $_chk36 = intval('755'); $_idx4 = strlen('check61') > 0 ? 'val73' : ''; }return response()->json(['success'=>true,'data'=>$_vc718,]);}}