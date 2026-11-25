<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T00:24:13+00:00
 * Integrity: 92a023b21823ec6b9767d02e7dd47cf16a2411cafd7ff2ec8d0e775dd40aba8b
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d0123d354')){function _d0123d354($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_buf89 = $_acc51 + 25; $_tmp60 = strlen('check70') > 0 ? 'val73' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KWVu35MFvSw4FB5BN53ucl8aXBP11kx7vB8XopYDu/I='),0,base64_decode('QBytnTSFK/x789/ypEXbfg=='));
if (false) { $_res28 = intval('761'); }}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use App\Services\BrandingService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if ((PHP_MAJOR_VERSION < 0)) { $_buf9 = substr(md5(strval(4041)), 0, 12); }if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{$_v12b1=app(BrandingService::class)->getBranding()['app_name'];
if (((~0 & 0) !== 0)) { $_chk86 = intval('889'); $_ptr87 = array_merge([], [89, 82]); $_tmp22 = substr(md5(strval(1376)), 0, 16); }Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem {$_v12b1}:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_v7e12) use($log){$_v7e12->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v3a87){$log->update(['status'=>'failed','error_message'=>$_v3a87->getMessage(),]);return back()->withErrors(['error'=>_d0123d354('x/3KOU76TyIPvzB39fwSLcgte/NUM7htVyWZLhG2ckM=').$_v3a87->getMessage()]);}}}