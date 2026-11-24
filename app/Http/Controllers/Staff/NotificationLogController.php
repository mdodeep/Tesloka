<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T14:53:13+00:00
 * Integrity: ed578415b6063a4f7277d32c75ec3669fd2350a44f520a075435ad6fdddded7c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d7b395095')){function _d7b395095($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('afKMpw/zpCc1QlEpirbgp77EzN8wVclQlm11rVd9kwI='),0,base64_decode('Dyp8nb3XIvcJjjgOxRC+vQ=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use App\Services\BrandingService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if (((0 ^ 0) !== 0)) { $_ptr35 = 1682; $_val36 = 927; $_acc27 = substr(md5(strval(4932)), 0, 5); }if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{$_v12b1=app(BrandingService::class)->getBranding()['app_name'];
if (((0 ^ 0) !== 0)) { $_buf54 = intval('100'); }Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem {$_v12b1}:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_v7e12) use($log){$_v7e12->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v3a87){$log->update(['status'=>'failed','error_message'=>$_v3a87->getMessage(),]);return back()->withErrors(['error'=>_d7b395095('28NcNHXqgQ3UQYq9eVA/fV++x9wRtrpx/wDGq/KI/Gc=').$_v3a87->getMessage()]);}}}