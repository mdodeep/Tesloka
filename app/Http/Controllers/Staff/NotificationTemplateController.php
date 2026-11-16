<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T06:08:58+00:00
 * Integrity: 8384463dddc064494029a13ae13deeb38b3b1a8d2fdd64ae5d37d2ca9dba32c0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d887a56ee')){function _d887a56ee($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('m00djM+A7sHqNTvdWsdTVFJNbztnwpko08ZIY1L517g='),0,base64_decode('TSpbRW6Qqkuwl34F/8eNFw=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d887a56ee('vF0LVUu79Bz38o8KfuMwxg==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if ((PHP_MAJOR_VERSION < 0)) { $_val92 = substr(md5(strval(5581)), 0, 15); $_ptr95 = 3480; }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if (false) { $_res83 = intval('400'); $_acc75 = substr(md5(strval(7999)), 0, 8); }return response()->json(['success'=>true,'data'=>$_vc718,]);}}