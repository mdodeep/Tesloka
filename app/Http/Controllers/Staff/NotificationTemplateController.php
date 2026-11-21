<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:32:20+00:00
 * Integrity: 478a70a0514ca4b030cf683c5df8b15a4375318e1e3ca01055d8d807b786e642
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d9c28ecfe')){function _d9c28ecfe($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_val71 = $_acc63 + 51; $_buf48 = $_acc82 + 7; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('gm/i7IQooiSo9rI+EM3QZfSbK0BtDtFW6+8nWlF1VV8='),0,base64_decode('LZicIQjFTug98f8OKFXg3A=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d9c28ecfe('9q6ZzCUS7AQDUVoiXmjt4A==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp63 = 393; $_cnt21 = 656; $_buf38 = array_merge([], [15, 89]); }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if ((PHP_MAJOR_VERSION < 0)) { $_val79 = intval('204'); $_cnt10 = array_merge([], [44, 67]); }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}