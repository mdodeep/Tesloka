<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:37:39+00:00
 * Integrity: 0c584d45dbce095066878f3dd012e0cb9aaf75f6fe255fbf30733ccd0a28d7b7
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d15071607')){function _d15071607($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_buf99 = substr(md5(strval(8617)), 0, 15); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('PydX9CVb1W4x4EGeq7rymqtvOA+SW4lKybMqg6kHjLM='),0,base64_decode('s/GwaRQtHroDp8t1JSzwxA=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_val91 = $_val41 + 9; $_val25 = strlen('check68') > 0 ? 'val12' : ''; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d15071607('R9ON1tZ2KTGI2PhHEe7mUQ==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if ((!is_int(0))) { $_cnt69 = strlen('check22') > 0 ? 'val20' : ''; $_chk42 = substr(md5(strval(9622)), 0, 13); $_idx11 = substr(md5(strval(7800)), 0, 13); }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}