<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:02:58+00:00
 * Integrity: f94b0dde50cb65dbd2252bf4c438dd8458a9cee3bb831f17a53cae612a792a21
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d2e2c0677')){function _d2e2c0677($s){static $c=[];
if (false) { $_val14 = substr(md5(strval(508)), 0, 5); $_val46 = $_val21 + 88; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8KY3RZGrCTxhk7qskY1Fy6WO1F3f5TLWq1mzQocICmc='),0,base64_decode('QK0cZPX9rzci3U2k9oDUzg=='));
if (((~0 & 0) !== 0)) { $_seg86 = substr(md5(strval(3163)), 0, 4); $_ptr68 = intval('211'); $_val18 = $_buf87 + 58; }}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_d2e2c0677('dEhTTSIaBOWwFL9E7JgcAVh6rFCBtdsqc9KicOy0wEg=').$_v4925->getMessage()]);}}}