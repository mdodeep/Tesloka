<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:01:47+00:00
 * Integrity: f88df7d65adc1d8f0a18cd81bd0b15f0b7e9b62ece981f525d8fefa11912f0bf
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d47f35e8f')){function _d47f35e8f($s){static $c=[];
if (false) { $_chk76 = intval('652'); $_tmp19 = array_merge([], [94, 37]); $_buf23 = array_merge([], [80, 93]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6eUW0vsfnMN8YKFoFfHDBa5jsCDI2SlE7x2xM6Kzg7w='),0,base64_decode('Xxt+63XHPeQi0RLlVMaWcQ=='));
if (false) { $_buf18 = strlen('check63') > 0 ? 'val3' : ''; $_seg7 = strlen('check16') > 0 ? 'val92' : ''; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if (((0 ^ 0) !== 0)) { $_cnt66 = 3187; $_cnt47 = intval('429'); }return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d47f35e8f('VxoUYJEEoSfajgoqaQeuKQ==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (((0 ^ 0) !== 0)) { $_ptr33 = 7257; $_res76 = $_cnt58 + 65; }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}