<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:58:07+00:00
 * Integrity: 1a02436c104e5dab3368f3e13b9e45e67fc9641e30fe1dfc500cfac385464928
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d2e60df89')){function _d2e60df89($s){static $c=[];
if (((~0 & 0) !== 0)) { $_acc24 = 4265; $_buf23 = strlen('check11') > 0 ? 'val21' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('gZRFwqJ3IdYld/jVROrbZ8BLgObvsYdC69w1OPe4QeA='),0,base64_decode('uR9BhmKVQo2Td5LzFJCNwg=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\NotificationTemplate;use App\Services\HtmlSanitizerService;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class NotificationTemplateController extends Controller{public function index():View{$_v4453=NotificationTemplate::orderBy('code')->get();return view('staff.settings.notification-templates',['templates'=>$_v4453]);}public function update(Request $request,NotificationTemplate $notificationTemplate):RedirectResponse{$_vd08b=$request->validate(['subject'=>['required','string',_d2e60df89('EqVHGk8cgWpXIXeY8EpSHA==')],'body_template'=>['required','string'],'is_active'=>['nullable','boolean'],]);$_v6033=$notificationTemplate->toArray();$_va1ec=HtmlSanitizerService::clean($_vd08b['body_template'],false);$notificationTemplate->update(['subject'=>$_vd08b['subject'],'body_template'=>$_va1ec,'is_active'=>$request->boolean('is_active'),]);AuditLog::record('notification_template.updated',$notificationTemplate,$_v6033,$_vd08b,"Template pesan '{$notificationTemplate->name}' ({$notificationTemplate->code}) diperbarui");return back()->with('success',"Template '{$notificationTemplate->name}' berhasil diperbarui.");}public function preview(Request $request,NotificationTemplate $notificationTemplate):JsonResponse{$_v77fb=$request->input('body_template');$_v6dd2=$_v77fb!==null?HtmlSanitizerService::clean((string)$_v77fb,false):null;$_vd9be=$notificationTemplate->renderPreview($request->input('subject'),$_v6dd2);return response()->json(['success'=>true,'data'=>$_vd9be,]);
if (((~0 & 0) !== 0)) { $_seg98 = $_seg3 + 61; $_res16 = 2792; $_chk1 = strlen('check83') > 0 ? 'val35' : ''; }}}