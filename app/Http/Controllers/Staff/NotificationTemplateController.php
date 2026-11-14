<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:32:36+00:00
 * Integrity: 5c09f9b12dd5876c3fb4fd536a0ea3dfc34dbcb79b618323df15f2d69457375e
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d25caf996')){function _d25caf996($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('BfSYVD4a9RTi7kQcI0YU65I5Fxh3yL5ew/KfWhPMf1w='),0,base64_decode('9wT4c9I7acdVZ8D/It04eQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d25caf996('pWCoIeG7Bf8ADnKwO+pq3w==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);
if (((~0 & 0) !== 0)) { $_ptr93 = 7076; $_buf29 = strlen('check9') > 0 ? 'val13' : ''; $_ptr21 = $_cnt15 + 6; }$_v6033=$notificationTemplate->toArray();$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_vd08b['body_template'],'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_vc718=$notificationTemplate->renderPreview($request->input('subject'),$request->input('body_template'));
if (((0 ^ 0) !== 0)) { $_cnt30 = substr(md5(strval(7101)), 0, 15); $_buf45 = 8956; }return response()->json(['success'=>true,'data'=>$_vc718,]);
if (false) { $_idx53 = $_tmp22 + 53; $_cnt92 = $_res2 + 33; }}}