<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:05:25+00:00
 * Integrity: 6bf75b5f50a067a401c4a59875f80ad2c41b597675022667189ae77fbdbcf9e0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da70092d3')){function _da70092d3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('J1hwTwFvoQVrqDRRhyZGcxnQ4Fh378WUjQP85OK83ec='),0,base64_decode('NP+CjCPmzy9+lB/vL0k11Q=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_da70092d3('YeA5Vyqhjz9nY4ZIEV3uGA==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if (((~0 & 0) !== 0)) { $_buf38 = strlen('check59') > 0 ? 'val72' : ''; $_ptr71 = intval('346'); }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);
if (false) { $_idx28 = $_seg32 + 31; $_acc41 = 9910; $_chk24 = $_res59 + 55; }}}