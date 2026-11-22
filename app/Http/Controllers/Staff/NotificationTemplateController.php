<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:14:49+00:00
 * Integrity: 096d75a3c35e79c736ec1fb7f20c5bf8340466d2a454dcd70de7e725cf6b9e60
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_de18f8e0d')){function _de18f8e0d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hGkLp/MhEFaYK8KjTdzr/tBRH7CuFOW643lkQlRozMw='),0,base64_decode('tVhodpPzZkiOVvv7qVwidQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc48 = $_cnt46 + 68; $_val94 = 4572; $_seg76 = array_merge([], [13, 93]); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_de18f8e0d('2sxbwRDYtNEvHR0Kff/+ng==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if (((PHP_INT_SIZE * 0) !== 0)) { $_val91 = strlen('check32') > 0 ? 'val86' : ''; $_idx49 = strlen('check21') > 0 ? 'val15' : ''; $_acc86 = substr(md5(strval(5899)), 0, 12); }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);
if (((~0 & 0) !== 0)) { $_idx13 = 3014; }}}