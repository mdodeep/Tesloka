<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:03:22+00:00
 * Integrity: 16a65b9464d88c8f5b1c02e23eb85fbd83cf70206971090d44187b4d78914702
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_de23c718f')){function _de23c718f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('WDTV51tv7v1jTrSASparEuHzdVTBoPxsK0EaBW/PRk0='),0,base64_decode('Et/dYBf+Fl6fj5l+0K1OGw=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use App\Services\HtmlSanitizerService;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if (((0 ^ 0) !== 0)) { $_buf9 = strlen('check56') > 0 ? 'val57' : ''; $_ptr32 = 6737; }return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if (((0 ^ 0) !== 0)) { $_chk43 = strlen('check15') > 0 ? 'val34' : ''; }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_de23c718f('zD+d1dlXm6SRBZ+IoO+/5A==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$_va1ec=HtmlSanitizerService::clean($_vd08b['body_template'],false);$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_va1ec,'is_active'=>$request->boolean('is_active'),]);
if ((!is_int(0))) { $_idx22 = $_chk52 + 30; $_tmp55 = strlen('check98') > 0 ? 'val84' : ''; $_buf7 = array_merge([], [47, 40]); }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_v77fb=$request->input('body_template');$_v6dd2=$_v77fb!==null?HtmlSanitizerService::clean((string)$_v77fb,false):null;$_vd9be=$notificationTemplate->renderPreview($request->input('subject'),$_v6dd2);return response()->json(['success'=>true,'data'=>$_vd9be,]);}}