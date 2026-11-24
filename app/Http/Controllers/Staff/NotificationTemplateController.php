<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T02:29:33+00:00
 * Integrity: 43fdf86efbfbbb1116c9caf705672898348bcddc1b8947fa1b458ec37cb62b52
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d9d2f2f3a')){function _d9d2f2f3a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oLiXtClN0lByp7vPMeOYjFsZQP7lsKPKeReiuL26alQ='),0,base64_decode('meDbLB8M2pFP7mxWVXb4Bg=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc14 = array_merge([], [47, 87]); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d9d2f2f3a('reRmmEilp81K6kD+JZ6H/w==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if (((0 ^ 0) !== 0)) { $_tmp89 = substr(md5(strval(2652)), 0, 10); $_idx5 = strlen('check87') > 0 ? 'val48' : ''; }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr83 = array_merge([], [63, 40]); $_cnt7 = $_chk1 + 100; }}}