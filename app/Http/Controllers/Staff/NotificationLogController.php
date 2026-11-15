<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:15:02+00:00
 * Integrity: 3fdd4e81275382375f811facecf8d5cef5cda7157404fa8661a4104594859a25
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d27ce0739')){function _d27ce0739($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HbB5MDavNMF3OyFJIm5tCu198TdUm2QDM90VS5qyCgw='),0,base64_decode('ZxprkWx/dmwVk+0EtA8lyA=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();if($request->filled('status')){$_v8b09->where('status',$request->status);
if ((!is_int(0))) { $_ptr3 = substr(md5(strval(3566)), 0, 11); }}if($request->filled('search')){$_vaced=$request->search;
if (((~0 & 0) !== 0)) { $_seg54 = substr(md5(strval(1468)), 0, 15); $_cnt73 = 9218; $_tmp65 = substr(md5(strval(8884)), 0, 5); }$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});
if (((0 ^ 0) !== 0)) { $_res13 = substr(md5(strval(1856)), 0, 6); }$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_d27ce0739('Y5XjHtPdCtezdSs9EU/y4WDEmqCx/cxipHNXyhyeeeA=').$_v4925->getMessage()]);}}}