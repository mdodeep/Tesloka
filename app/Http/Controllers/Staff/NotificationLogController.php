<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:45:02+00:00
 * Integrity: cf98ba2c71528e9bdc17aab38b6f55c39eb3a0fed2e7bcd025c2730a723a9a14
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d53ac04db')){function _d53ac04db($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Q2Psja/bEffTj993djcj/PQg6dtzT/1VkXRdVIXH0yo='),0,base64_decode('/9fAGCsRVTTov4aOl16XRw=='));
if (false) { $_buf51 = array_merge([], [58, 36]); }}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use App\Services\BrandingService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;
if (((~0 & 0) !== 0)) { $_idx30 = strlen('check88') > 0 ? 'val70' : ''; $_idx38 = strlen('check20') > 0 ? 'val23' : ''; $_cnt91 = array_merge([], [19, 4]); }$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{$_v12b1=app(BrandingService::class)->getBranding()['app_name'];
if (((0 ^ 0) !== 0)) { $_idx70 = strlen('check27') > 0 ? 'val22' : ''; $_tmp72 = intval('320'); }Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem {$_v12b1}:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_v7e12) use($log){$_v7e12->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v3a87){$log->update(['status'=>'failed','error_message'=>$_v3a87->getMessage(),]);return back()->withErrors(['error'=>_d53ac04db('DnvpIZOQ/r+LIf4qg3SUKlGxiEc6wyBKn+FA9oGFeIc=').$_v3a87->getMessage()]);}}}