<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:25:41+00:00
 * Integrity: 06fe3ceaa52ad5c24139266f28cd1a5f0d32ff6e436dbf7c9c8fe44ba35dd22b
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d550dc1dd')){function _d550dc1dd($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr94 = substr(md5(strval(1883)), 0, 13); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hw/iEq443sVAkianapJGRS81Mtl+HTvb02aNgFRsV60='),0,base64_decode('MqOHMUoPEHNCcsZJCaaTXA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res70 = strlen('check96') > 0 ? 'val96' : ''; }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d550dc1dd('Rwg89alvZQDm7rq5HHvZHw==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if ((!is_int(0))) { $_res10 = 2288; $_tmp65 = strlen('check96') > 0 ? 'val28' : ''; }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}