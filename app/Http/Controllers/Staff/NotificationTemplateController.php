<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:38:34+00:00
 * Integrity: f5de456ce7b5a3ffff444b8d6e857cd97d6610ca1b6892c02107dfc3b0b527ec
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d7c5467ef')){function _d7c5467ef($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_val13 = 2402; $_seg59 = array_merge([], [1, 35]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('PjQbD8POxQpaZrKZrJzxTez2QmK6MY2eO5+CpMREdHI='),0,base64_decode('dgFklA/oPh1WPAvG3IzgnQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d7c5467ef('MRMzLcTvp8Kg+YFHEqcNBQ==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if ((!is_int(0))) { $_val13 = 906; $_cnt43 = intval('240'); }$_v6033=$notificationTemplate->toArray();
if (false) { $_seg78 = strlen('check8') > 0 ? 'val14' : ''; $_tmp19 = substr(md5(strval(738)), 0, 6); }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}