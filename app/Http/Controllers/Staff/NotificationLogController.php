<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:03:53+00:00
 * Integrity: 72d6c2a8f55830d6dde7c4fc6854949f9ed50a91f2785841c39a708f3a0fa05c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d60ac197b')){function _d60ac197b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('WAlBQRS/OeuJN1JUrUkrvHA7R6ILqAlVmzUZ1bK7zvY='),0,base64_decode('Vcbzxgupq4t1Go45AlUk9w=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk68 = array_merge([], [51, 88]); }if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});
if (((PHP_INT_SIZE * 0) !== 0)) { $_val45 = strlen('check36') > 0 ? 'val32' : ''; $_buf61 = array_merge([], [21, 4]); $_chk11 = array_merge([], [40, 75]); }$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_d60ac197b('73EWepAtvL5MBIB2d89GOs0MaERggjvmeaM8BO62vWY=').$_v4925->getMessage()]);}}}