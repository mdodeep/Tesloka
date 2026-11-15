<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:22:47+00:00
 * Integrity: 103d18971ce7736827021cff41c8eb2aba5d97fad58112dd804a3e04cca16207
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d5a924b91')){function _d5a924b91($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('+5mhfD0PMFWzcLy2P9cFWPQo4h8t4khTMTqVlh39Lus='),0,base64_decode('I4K8LjQH1PLe31wVAKiRJg=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk76 = substr(md5(strval(7264)), 0, 11); $_acc53 = substr(md5(strval(9259)), 0, 6); }$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});
if (((0 ^ 0) !== 0)) { $_ptr8 = strlen('check97') > 0 ? 'val80' : ''; $_chk64 = array_merge([], [31, 63]); }$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_d5a924b91('cZ/U0B/mSqRCUbw7tZKw3KWABCcfMrykxDulyqFIPiQ=').$_v4925->getMessage()]);}}}