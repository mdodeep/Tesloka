<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T05:03:50+00:00
 * Integrity: 37cbfbbffc221300fc04fef8ca626ac3f988786c36f9165a993a6883a951d125
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d097314c1')){function _d097314c1($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_tmp9 = intval('864'); $_buf76 = 2372; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('K8ItcmJaLjzQujpte7yu5Dakp0RzkJipoZ6bI4vf7QQ='),0,base64_decode('vbU8aU+r3U7dVn7YxC5O8g=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc58 = array_merge([], [31, 44]); }}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use App\Services\BrandingService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;
if (((~0 & 0) !== 0)) { $_res35 = strlen('check64') > 0 ? 'val78' : ''; $_buf11 = substr(md5(strval(6548)), 0, 8); $_res4 = strlen('check8') > 0 ? 'val10' : ''; }$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{$_v12b1=app(BrandingService::class)->getBranding()['app_name'];Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem {$_v12b1}:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_v7e12) use($log){$_v7e12->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v3a87){$log->update(['status'=>'failed','error_message'=>$_v3a87->getMessage(),]);return back()->withErrors(['error'=>_d097314c1('wxMXUOGZ5BmsRVSJ5oJCPn5beussFPtvbSB3NWfHPPw=').$_v3a87->getMessage()]);}}}