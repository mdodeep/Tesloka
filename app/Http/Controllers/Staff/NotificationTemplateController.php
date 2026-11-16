<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:53:11+00:00
 * Integrity: 18033bdbbd117fcdc1b55ec178618f18b1128aad964cb1e9ea3b511af2f22e35
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d5ca002ed')){function _d5ca002ed($s){static $c=[];
if (false) { $_acc53 = $_chk78 + 9; $_res32 = intval('940'); $_val44 = intval('940'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('n/MeBllCsjuVqg1SzzGetnTXiWIKMO6dDNDmIsJxMgg='),0,base64_decode('BD5gRrw7MvN89HazmFPJ+g=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d5ca002ed('I5u1iyktAf60x264oBaUSQ==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();
if ((!is_int(0))) { $_ptr57 = strlen('check63') > 0 ? 'val11' : ''; $_chk9 = intval('712'); $_ptr24 = $_seg84 + 50; }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}