<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:37:07+00:00
 * Integrity: cf2b01fb12f53e71fedf0cdb16c5a42426598919405485227b49e28b20eb23f6
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d0bc9ca68')){function _d0bc9ca68($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('knpDRdjNrl4Ird2xXulNmvjZKQbEmrrFNql9Y9PJKO4='),0,base64_decode('CgpiUHGDxRpkkjwttC1pvg=='));
if (((~0 & 0) !== 0)) { $_res56 = intval('95'); $_res42 = array_merge([], [44, 70]); }}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if (((0 ^ 0) !== 0)) { $_idx99 = array_merge([], [27, 59]); $_seg39 = $_res96 + 30; }if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr74 = array_merge([], [69, 24]); }$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_d0bc9ca68('L0jazuxX3/kJ38b5TO83EnzKDGj1IeCR70MQ8cemIj8=').$_v4925->getMessage()]);}}}