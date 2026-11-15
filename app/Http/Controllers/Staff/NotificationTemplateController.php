<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:46:00+00:00
 * Integrity: 48f468b9c8a9e8e6ed3ace6c1f4ac494a45f3d31c5c438ff237bc99f719e765d
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_de61c6e1f')){function _de61c6e1f($s){static $c=[];
if (false) { $_ptr68 = $_chk51 + 38; $_seg23 = substr(md5(strval(3053)), 0, 9); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('krTnKsYcTVbWp91WU0LpW/bJaIgLPn3Be8mrgFPeje0='),0,base64_decode('I/y5c0YF4/T6Cca3zbm+YQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_de61c6e1f('GjaYMcRblxhv/JGocplHQQ==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if (false) { $_acc5 = intval('936'); $_tmp17 = substr(md5(strval(8947)), 0, 5); }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}