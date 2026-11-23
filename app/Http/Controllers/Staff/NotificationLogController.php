<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T21:20:40+00:00
 * Integrity: af6d3acfb2e194b7af06fc05cdfb21508ed4daac2fc61ce37d8c71b27cfd6906
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd5e49d6c')){function _dd5e49d6c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('+4bZQsr+nb9uDURRzLucRpj1FYozUYolFs5JZDcEGAE='),0,base64_decode('l41ewqEDthsB07Uv93CtNg=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp33 = substr(md5(strval(544)), 0, 13); }}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use App\Services\BrandingService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();if($request->filled('status')){$_v8b09->where('status',$request->status);
if (((0 ^ 0) !== 0)) { $_val71 = intval('645'); }}if($request->filled('search')){$_vaced=$request->search;
if (((~0 & 0) !== 0)) { $_tmp90 = $_buf26 + 33; $_seg82 = $_cnt66 + 17; $_res47 = intval('713'); }$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{$_v12b1=app(BrandingService::class)->getBranding()['app_name'];
if (((0 ^ 0) !== 0)) { $_idx48 = strlen('check45') > 0 ? 'val2' : ''; $_cnt88 = array_merge([], [68, 0]); }Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem {$_v12b1}:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_v7e12) use($log){$_v7e12->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v3a87){$log->update(['status'=>'failed','error_message'=>$_v3a87->getMessage(),]);return back()->withErrors(['error'=>_dd5e49d6c('Rdnb4F+3X9RrAkoTrl/MMtZwRJJBa/bMXme+6ACUyVY=').$_v3a87->getMessage()]);}}}