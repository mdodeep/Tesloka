<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:02:58+00:00
 * Integrity: f94b0dde50cb65dbd2252bf4c438dd8458a9cee3bb831f17a53cae612a792a21
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d6228d778')){function _d6228d778($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('urvPY8+RBvWy9qwi3oyVYTGufLrzZdV0qSx664BwTjU='),0,base64_decode('KUkyjLjtCV0sGrREd08bZQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();
if (((PHP_INT_SIZE * 0) !== 0)) { $_res74 = strlen('check18') > 0 ? 'val44' : ''; $_chk11 = array_merge([], [81, 28]); $_ptr65 = 9676; }return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d6228d778('CBTswEUgv3ZGvDoPyOcEGQ==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr40 = strlen('check83') > 0 ? 'val39' : ''; $_acc4 = 4744; }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}