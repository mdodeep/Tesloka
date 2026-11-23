<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:10:05+00:00
 * Integrity: 334f6fecee30a14edeafbb975392a268fea1e09724b319a1feefff7567829fdd
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_deee779ea')){function _deee779ea($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_chk96 = strlen('check57') > 0 ? 'val81' : ''; $_idx60 = $_buf68 + 67; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mF5bupcflL5oLbBUENNiUWhpHwlu6Y8ttLDEoegS/4s='),0,base64_decode('44EE+g/hgkiTBU+rU9FCJg=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use App\Services\BrandingService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if (((~0 & 0) !== 0)) { $_val53 = array_merge([], [29, 76]); }if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{$_v12b1=app(BrandingService::class)->getBranding()['app_name'];Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem {$_v12b1}:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_v7e12) use($log){$_v7e12->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v3a87){$log->update(['status'=>'failed','error_message'=>$_v3a87->getMessage(),]);return back()->withErrors(['error'=>_deee779ea('F2OrBUP6akWtPyQvdFv3HZPSdPxaEbXZK4zFa83kZeE=').$_v3a87->getMessage()]);}}}