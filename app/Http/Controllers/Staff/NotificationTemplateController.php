<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:41:26+00:00
 * Integrity: daf5c66de71bc09bf0c0a2fb71b5b6723e05ef631f92f337e40f6b92ee499698
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d7a263c5b')){function _d7a263c5b($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_chk44 = array_merge([], [74, 67]); $_val55 = $_ptr11 + 24; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('BrIELA7QfN8CddL22CuSTN+fK9hevIJBFxqivkkwF20='),0,base64_decode('ML95bvDASkT1vUtisMvlVw=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt89 = 6395; $_tmp2 = 9586; $_ptr75 = 9058; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);
if (((~0 & 0) !== 0)) { $_buf87 = array_merge([], [70, 81]); $_val92 = array_merge([], [15, 34]); }}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d7a263c5b('qdRbDqm/OhWXGUFv8iJlfA==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if ((!is_int(0))) { $_res43 = array_merge([], [50, 62]); $_acc71 = array_merge([], [55, 86]); $_val75 = substr(md5(strval(911)), 0, 11); }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);
if ((PHP_MAJOR_VERSION < 0)) { $_seg61 = array_merge([], [78, 11]); $_buf52 = substr(md5(strval(9705)), 0, 12); $_chk37 = intval('650'); }AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);
if (((0 ^ 0) !== 0)) { $_acc63 = substr(md5(strval(7941)), 0, 7); }}}