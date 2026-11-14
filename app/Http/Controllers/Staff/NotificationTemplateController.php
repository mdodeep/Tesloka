<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:10:05+00:00
 * Integrity: f552c9220b05edb07406453dda5b87d17b218ff27669c44747c6e915e2d06c19
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d35b5575d')){function _d35b5575d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Sbu+jhx6JLbk1EIoikOBDw68APhKhUbrnScQr+lStz4='),0,base64_decode('U9VeYcdfs8EoAMjQWEqOeQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if (((0 ^ 0) !== 0)) { $_res42 = array_merge([], [18, 69]); }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d35b5575d('vs73xVB/Tw18aX1mQB23uw==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if (((0 ^ 0) !== 0)) { $_buf9 = strlen('check76') > 0 ? 'val73' : ''; }return response()->json(['success'=>true,'data'=>$_vc718,]);
if (false) { $_idx75 = array_merge([], [22, 42]); $_acc17 = 9192; }}}