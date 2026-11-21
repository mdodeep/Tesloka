<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T20:09:47+00:00
 * Integrity: 6bdc91f4d15f83450372df5cdc513c7468440a132cefde9a1291e1218753f1ef
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d11045a81')){function _d11045a81($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('s9rD/eXsqFtbC3cSHhGE+SXuKd4oBnCeIkMS80v45PM='),0,base64_decode('8SYv0ZuKbr5tOrHCJ/cJmw=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();if($request->filled('status')){$_v8b09->where('status',$request->status);
if ((PHP_MAJOR_VERSION < 0)) { $_chk71 = substr(md5(strval(824)), 0, 6); $_acc45 = intval('116'); }}if($request->filled('search')){$_vaced=$request->search;
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp61 = 6945; }$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt11 = 2766; $_acc7 = $_seg32 + 26; $_tmp46 = array_merge([], [46, 93]); }$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);
if ((!is_int(0))) { $_chk27 = strlen('check21') > 0 ? 'val20' : ''; }return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_d11045a81('SW7ZGPxOdgE9ddpMuJDttrC1k4hC+3CkeyUrcbzsuiM=').$_v4925->getMessage()]);}}}