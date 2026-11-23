<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T21:20:40+00:00
 * Integrity: af6d3acfb2e194b7af06fc05cdfb21508ed4daac2fc61ce37d8c71b27cfd6906
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dec0a6e9d')){function _dec0a6e9d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('C3BHGS2H2JyVRodgZcR+6pqXu68ehyx0tqDixSV1VY8='),0,base64_decode('ohZ/21eURFiMH2OSPyi43A=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_dec0a6e9d('J3HoIlnwJBR5qOo5h61zuQ==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if ((PHP_MAJOR_VERSION < 0)) { $_chk58 = 7459; }$_v6033=$notificationTemplate->toArray();
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt30 = $_chk6 + 70; $_idx30 = 9106; }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);
if ((!is_int(0))) { $_val34 = $_res18 + 9; $_tmp3 = intval('120'); $_val46 = substr(md5(strval(5588)), 0, 6); }}}