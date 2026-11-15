<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:37:07+00:00
 * Integrity: cf2b01fb12f53e71fedf0cdb16c5a42426598919405485227b49e28b20eb23f6
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d465aa67d')){function _d465aa67d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('GeH8JzUiSj5WUEeONQJ3RnbOamRFdE/siP2hFb0zzak='),0,base64_decode('BEPaNENJ512O+m5ACr4Ppg=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if ((!is_int(0))) { $_tmp12 = 4791; }return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d465aa67d('0cXvMAUo3mRqtDTuDV9hAA==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if (((0 ^ 0) !== 0)) { $_acc39 = strlen('check66') > 0 ? 'val71' : ''; $_seg55 = $_cnt89 + 46; }return response()->json(['success'=>true,'data'=>$_vc718,]);}}