<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:14:13+00:00
 * Integrity: 18b57aa627fd74aee36ec4e10d76eb437cbf3e3f51cf591ed361ffcb18cf37ac
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d76212683')){function _d76212683($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ljz4g2zN0Nh6DVKbLk/8lMBRTa9V7dorfjF4TA5MNtU='),0,base64_decode('VBlb+iO5LQpMl6BIBSRU+Q=='));
if (((~0 & 0) !== 0)) { $_ptr2 = substr(md5(strval(4884)), 0, 11); }}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if (((0 ^ 0) !== 0)) { $_acc4 = $_seg50 + 6; $_acc96 = strlen('check24') > 0 ? 'val3' : ''; }if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;
if ((!is_int(0))) { $_seg58 = array_merge([], [65, 1]); $_val15 = strlen('check6') > 0 ? 'val35' : ''; $_tmp69 = intval('747'); }$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);
if (((~0 & 0) !== 0)) { $_ptr18 = intval('870'); $_cnt54 = array_merge([], [44, 18]); $_res55 = 8992; }return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_d76212683('GIBvuuO4JxnMnkmQXfFr6R6V2p3zRqQ30BSMVy54UkQ=').$_v4925->getMessage()]);}}}