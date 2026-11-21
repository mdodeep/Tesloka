<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:32:20+00:00
 * Integrity: 478a70a0514ca4b030cf683c5df8b15a4375318e1e3ca01055d8d807b786e642
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d727e92f2')){function _d727e92f2($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_tmp5 = strlen('check99') > 0 ? 'val85' : ''; $_val95 = array_merge([], [11, 70]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('tf4CZIlElTkCN7GpD9V0xD3x85JFLnRdVWVbNPhBNzI='),0,base64_decode('bkeCL6686BqTv8hj45zrsg=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if ((PHP_MAJOR_VERSION < 0)) { $_idx27 = 2551; $_buf34 = intval('803'); }if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_d727e92f2('j74nHGs2HMMKD75RkBhrsfsNd2UYj1EOc7tJu2ZfT68=').$_v4925->getMessage()]);}}}