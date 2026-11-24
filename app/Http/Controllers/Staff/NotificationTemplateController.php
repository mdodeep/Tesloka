<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:39:09+00:00
 * Integrity: a91e29094976d1766c3ee1aa493fd3ef1fe827291d2b2c6f89c361f45473ca24
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d6a2be013')){function _d6a2be013($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8AQEJ0CzYXs8RF/m4kdCU+K+0TEqR21PxwF94HOb6Sk='),0,base64_decode('Ph6QK9220YoGoO6o3bTE3g=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d6a2be013('RXaJTk9ZIwJOGjIq3JoyZg==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr8 = $_acc37 + 20; $_buf97 = $_ptr74 + 10; }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}