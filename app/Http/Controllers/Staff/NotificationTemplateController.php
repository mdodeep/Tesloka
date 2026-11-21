<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T14:24:19+00:00
 * Integrity: bf2697bb1f9255c265ae45edf604e6bc661d7bf26f919e87b20c3c60ced12910
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d0c6f55d4')){function _d0c6f55d4($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk47 = 7852; $_buf40 = 7314; $_idx92 = 4923; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6Ys7sRvIHEnF4vsu5id4aLPAWLOoZGWT71jEr/um7oI='),0,base64_decode('OsI/N14Ybnjp3M7MbPNaIg=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d0c6f55d4('siy/0fp2fWsEVbMgi6Rd2w==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if ((!is_int(0))) { $_val7 = array_merge([], [9, 97]); }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}