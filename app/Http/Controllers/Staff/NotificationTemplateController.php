<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:12:47+00:00
 * Integrity: 1cdeb71c732ef090d82efb9eedef96d124d99060b2369817c5185abbd41d6868
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da87b9fc3')){function _da87b9fc3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Lz5PQeSoxb7+O+lka6W6LphPcgkwKQt845BcqW+BDJ4='),0,base64_decode('wyUJXS+MCyQ6EC7WGuQPcQ=='));
if (((0 ^ 0) !== 0)) { $_seg9 = strlen('check36') > 0 ? 'val42' : ''; $_acc1 = 9255; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_da87b9fc3('DDE8wp7owvueb05ThIX9gA==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (((0 ^ 0) !== 0)) { $_idx65 = substr(md5(strval(5018)), 0, 12); }$_v6033=$notificationTemplate->toArray();
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx32 = 3756; $_cnt15 = $_val33 + 79; $_tmp98 = array_merge([], [79, 50]); }$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));return response()->json(['success'=>true,'data'=>$_vc718,]);}}