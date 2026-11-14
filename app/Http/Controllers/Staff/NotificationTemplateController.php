<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:47:31+00:00
 * Integrity: 3849ab4825874ba3b4a694f789db49a2717d82dbfb50c0c7a56a0c623d677587
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd46a436e')){function _dd46a436e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('yVTUTOgC4uql5YokTccjoFuPjIzYpwlyMK1tsHONEMU='),0,base64_decode('LWaU47OBG1xDL0Tj+8V+TQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg21 = substr(md5(strval(5550)), 0, 9); $_val19 = strlen('check9') > 0 ? 'val7' : ''; }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_dd46a436e('zLCEJFhaNFo4vC/6wFST/A==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (false) { $_res44 = 5826; }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if ((!is_int(0))) { $_tmp26 = intval('918'); $_buf50 = array_merge([], [58, 34]); }return response()->json(['success'=>true,'data'=>$_vc718,]);}}