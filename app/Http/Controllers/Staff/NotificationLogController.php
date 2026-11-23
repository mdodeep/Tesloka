<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:17:55+00:00
 * Integrity: bdeaf86c3382669bdfea6ebf51d5418a6e22948d723c091cf74131355cf40149
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d5aa93cdc')){function _d5aa93cdc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('iJ9eMehQmUP9mKfTHQU2oJ7X40I7JS0xQJV0YDnahq0='),0,base64_decode('KRhe/5yqehv9VgoMp7d0Gw=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if ((PHP_MAJOR_VERSION < 0)) { $_res43 = 1274; }if($request->filled('status')){$_v8b09->where('status',$request->status);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt7 = substr(md5(strval(9207)), 0, 14); $_seg53 = substr(md5(strval(984)), 0, 6); $_cnt56 = $_seg62 + 25; }}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_d5aa93cdc('mZPMogPlXKgRTn9QoO87ZFLRAZKn89wUjxLhxzJ0VoI=').$_v4925->getMessage()]);}}}