<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:27:05+00:00
 * Integrity: 2dd5e69a57b3c93d41101bfaa52adb374bd27091b2f752434367e6ab869eb8ad
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da0143009')){function _da0143009($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp53 = substr(md5(strval(5197)), 0, 16); $_cnt93 = 8678; $_acc35 = array_merge([], [23, 75]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('35yGDjuonn1kvRTLK8iKAEqj311Kf1n/dldnWmv1ADA='),0,base64_decode('8SrvhBurGfRLEs43ammyjg=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use App\Services\BrandingService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if (((~0 & 0) !== 0)) { $_chk67 = intval('388'); }if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;
if (((~0 & 0) !== 0)) { $_val49 = substr(md5(strval(313)), 0, 15); $_cnt30 = array_merge([], [49, 13]); }$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{$_v12b1=app(BrandingService::class)->getBranding()['app_name'];Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem {$_v12b1}:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_v7e12) use($log){$_v7e12->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v3a87){$log->update(['status'=>'failed','error_message'=>$_v3a87->getMessage(),]);return back()->withErrors(['error'=>_da0143009('0ux968QBRjdT7tk/RiEoSTD4P5/WtJ7m7p1zObYHWCw=').$_v3a87->getMessage()]);}}}