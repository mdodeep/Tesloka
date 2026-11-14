<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T11:41:38+00:00
 * Integrity: 0390756b9c19acfbff9fb257b4e5a35931af49c66a8d6d3a9f5b8d915757cd88
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da946da57')){function _da946da57($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jyFF0brnMqTilOKxejgp6TvwXdZCWzxgMvVG5HbsRmA='),0,base64_decode('ghSVr02IAcztFnyzZnHWiA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_da946da57('Bgpk7Vu9r9jnKSNO3uODlg==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx11 = substr(md5(strval(3514)), 0, 9); $_chk81 = 5001; }return response()->json(['success'=>true,'data'=>$_vc718,]);}}