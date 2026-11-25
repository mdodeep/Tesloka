<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:00:39+00:00
 * Integrity: 3bad3d4fa11dee0cfe1ada07762cbe00c63a79c37c90885345211f475742f7f8
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dfafe9a00')){function _dfafe9a00($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('RVE5xs4FWBjnzOHxggkr/di6ZUkxZ62pd1qLL5bCUKA='),0,base64_decode('FJJSALmz1wZ6PfdoRm4+gA=='));
if (((0 ^ 0) !== 0)) { $_buf58 = 6517; $_acc85 = substr(md5(strval(3686)), 0, 10); $_ptr84 = 7051; }}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use App\Services\BrandingService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();if($request->filled('status')){$_v8b09->where('status',$request->status);
if ((!is_int(0))) { $_ptr83 = array_merge([], [49, 87]); $_idx72 = strlen('check72') > 0 ? 'val31' : ''; $_acc3 = substr(md5(strval(730)), 0, 6); }}if($request->filled('search')){$_vaced=$request->search;
if ((PHP_MAJOR_VERSION < 0)) { $_val82 = 447; $_res4 = strlen('check94') > 0 ? 'val33' : ''; }$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{$_v12b1=app(BrandingService::class)->getBranding()['app_name'];Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem {$_v12b1}:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_v7e12) use($log){$_v7e12->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v3a87){$log->update(['status'=>'failed','error_message'=>$_v3a87->getMessage(),]);return back()->withErrors(['error'=>_dfafe9a00('NfZeh0hoB9gzmPN2E8VfSyBX1483lBAwKDAqQASM+wM=').$_v3a87->getMessage()]);}}}