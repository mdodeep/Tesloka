<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:44:38+00:00
 * Integrity: 6bebe3580004a7d7d00d2d1d57cd2ccac4603fdfdc53eb82d55e034c18adc7cf
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d83683f95')){function _d83683f95($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_buf0 = $_acc78 + 94; $_tmp18 = $_seg21 + 75; $_cnt19 = array_merge([], [68, 10]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('aQWosKIP3Ib2gB3yQlupvGyvbQrvJfNa66Yk+uZai14='),0,base64_decode('nuLja83QOc/O4I93e8ZFbA=='));
if ((PHP_MAJOR_VERSION < 0)) { $_seg91 = substr(md5(strval(6092)), 0, 16); $_cnt62 = 3932; $_acc3 = 1421; }}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_d83683f95('jb+t72V7T+53UknkWbkYOhOE4VV2be3EmzG21lb22HY=').$_v4925->getMessage()]);}}}