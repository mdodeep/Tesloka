<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:47:05+00:00
 * Integrity: 2c081de88a09f26010759678eeb0fac06b7152875c6795cfafe5f71b9709c5da
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_df8bc184a')){function _df8bc184a($s){static $c=[];
if (((~0 & 0) !== 0)) { $_cnt2 = substr(md5(strval(9189)), 0, 13); $_res40 = $_cnt2 + 74; $_acc62 = $_buf92 + 84; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('dbkfNkFLl0YhDOTs3fONQzVaYsm/PDd/GqmNDC4Xmks='),0,base64_decode('wJRv/7JLRIsJBLL7+bdQ+w=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_df8bc184a('Vq0RLualZB3RaFtiZOQDmg==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf9 = array_merge([], [20, 44]); $_idx95 = $_seg62 + 20; $_buf52 = strlen('check57') > 0 ? 'val78' : ''; }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc96 = 5189; $_ptr9 = $_chk31 + 84; $_acc8 = strlen('check18') > 0 ? 'val36' : ''; }return response()->json(['success'=>true,'data'=>$_vc718,]);}}