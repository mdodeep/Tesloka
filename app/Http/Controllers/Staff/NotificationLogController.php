<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:44:10+00:00
 * Integrity: b2577c241450b89eecab7e94bb002d9340d48cc00c99122cbda6c8fe9dbe74d1
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d4334fe2d')){function _d4334fe2d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('fp+BDNEYQbScaty2hn5VYrAFhxt0KVZ5qIiX7iSL6Lw='),0,base64_decode('qpC9dQJPBS/kKHJ1rdFosg=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();if($request->filled('status')){$_v8b09->where('status',$request->status);
if ((PHP_MAJOR_VERSION < 0)) { $_idx1 = array_merge([], [3, 92]); $_seg64 = strlen('check6') > 0 ? 'val85' : ''; }}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});
if (((~0 & 0) !== 0)) { $_buf97 = $_buf68 + 97; $_res43 = substr(md5(strval(4007)), 0, 4); }$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);
if (((~0 & 0) !== 0)) { $_tmp38 = array_merge([], [83, 81]); }return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_d4334fe2d('K+dPmvR/rZq20I+otOKHG8JCX6a1OHL39JTF/sN2b8c=').$_v4925->getMessage()]);}}}