<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T11:21:15+00:00
 * Integrity: 6d61329537e391e5ad76dd64a004a1d7f98b5ad76fcda3ec4b3e470c9334a10a
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d1d75069c')){function _d1d75069c($s){static $c=[];
if (false) { $_tmp80 = array_merge([], [94, 66]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Z27Yn2at8j0l0schewUVfhCNxHm0Yb61FbGWfHyuDY0='),0,base64_decode('6Frw08CakHOVXHBMQjuAkw=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d1d75069c('M5HTTybZnb7Lti4b4ZOk/w==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if (((0 ^ 0) !== 0)) { $_seg30 = strlen('check45') > 0 ? 'val64' : ''; }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);
if ((!is_int(0))) { $_seg62 = intval('256'); $_acc93 = substr(md5(strval(819)), 0, 8); $_val81 = intval('618'); }}}