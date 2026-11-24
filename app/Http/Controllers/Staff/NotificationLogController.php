<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T10:44:49+00:00
 * Integrity: 0617fe45b49cd5d031a22b03bf5ebd8f1d93ffe50a9543382cbcd3000291716c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dac188387')){function _dac188387($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_tmp92 = strlen('check4') > 0 ? 'val21' : ''; $_res31 = substr(md5(strval(7119)), 0, 12); $_val9 = 4584; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OIvc6YCspZeXIKInnAJ5vnwnII7N+NAv4v3Fwk4zKbI='),0,base64_decode('A0jwrBWHt0tQna5NDl3j7Q=='));
if (((~0 & 0) !== 0)) { $_seg40 = $_tmp76 + 78; }}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use App\Services\BrandingService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if ((PHP_MAJOR_VERSION < 0)) { $_acc11 = substr(md5(strval(3561)), 0, 13); $_res55 = strlen('check35') > 0 ? 'val84' : ''; }if($request->filled('status')){$_v8b09->where('status',$request->status);
if (((~0 & 0) !== 0)) { $_chk69 = array_merge([], [99, 37]); }}if($request->filled('search')){$_vaced=$request->search;
if (((PHP_INT_SIZE * 0) !== 0)) { $_val59 = 7482; }$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{$_v12b1=app(BrandingService::class)->getBranding()['app_name'];Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem {$_v12b1}:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_v7e12) use($log){$_v7e12->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v3a87){$log->update(['status'=>'failed','error_message'=>$_v3a87->getMessage(),]);return back()->withErrors(['error'=>_dac188387('7mlkEgF7KE/3XvQmIXchWujehwPqar2ZeyrOK/UtFw0=').$_v3a87->getMessage()]);}}}