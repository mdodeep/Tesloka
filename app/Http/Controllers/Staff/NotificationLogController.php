<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:34:56+00:00
 * Integrity: 1616d70ea295bee04dbd2667613704e9a193fe91f5bd7deff383c04143dd6e93
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dacdd2f97')){function _dacdd2f97($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Fh5Hm6dpM5of0CLW8jZ3fv8NNIGda/Y7TYRgG4KldIw='),0,base64_decode('dgXxbcAjBVOwdwc/PK4/Rw=='));
if (((~0 & 0) !== 0)) { $_idx22 = $_seg35 + 80; $_chk74 = strlen('check3') > 0 ? 'val3' : ''; }}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr61 = $_val10 + 28; }if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_dacdd2f97('lrPm7ozG72BMmmylh75XxXtqQmm3ynF8ETw/yjNR6R8=').$_v4925->getMessage()]);}}}