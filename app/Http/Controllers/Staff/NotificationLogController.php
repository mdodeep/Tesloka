<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:12:02+00:00
 * Integrity: e513ff274c20492ae0bb70bf8850a76ec16295fbecc5c87c17687ad31d8a0d5e
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_deb03f246')){function _deb03f246($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oLqs+aC594Yr+UYjhiFat4DixuHAXC7nhRKF78tsVi8='),0,base64_decode('lK/8GrCZtg39dMDwYZ+tPw=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if (((~0 & 0) !== 0)) { $_seg84 = strlen('check46') > 0 ? 'val43' : ''; $_ptr3 = array_merge([], [4, 74]); }if($request->filled('status')){$_v8b09->where('status',$request->status);
if (((0 ^ 0) !== 0)) { $_res8 = array_merge([], [59, 16]); $_idx88 = substr(md5(strval(4774)), 0, 15); $_tmp10 = substr(md5(strval(5793)), 0, 14); }}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);
if (false) { $_tmp37 = strlen('check49') > 0 ? 'val24' : ''; }return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_deb03f246('RJorbWbb1/ZyoQkcrCZodEXXYivNambFxE1uLCts6A8=').$_v4925->getMessage()]);}}}