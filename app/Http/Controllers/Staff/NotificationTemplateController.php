<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T16:48:10+00:00
 * Integrity: 04ffaf636ee12913df2f2d8d61787bdf1d31fe684bdb3c318a2fd204084cd70c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d33f86d21')){function _d33f86d21($s){static $c=[];
if (((~0 & 0) !== 0)) { $_tmp84 = substr(md5(strval(8013)), 0, 9); $_buf15 = intval('472'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('+lMZDDsy0FoyaBMacjQmmAhXdGi4ix17iSOjnggQNdA='),0,base64_decode('i7mQ0LD0VZ/vTZ/K7UOXiA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if (((~0 & 0) !== 0)) { $_acc37 = $_idx67 + 49; $_tmp66 = substr(md5(strval(5156)), 0, 10); $_res87 = $_val51 + 33; }return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d33f86d21('XuOkcDy6Hbsa9LaNTud2RA==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if (((0 ^ 0) !== 0)) { $_idx36 = 7717; $_res80 = strlen('check99') > 0 ? 'val10' : ''; }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}