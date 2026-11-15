<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T03:52:05+00:00
 * Integrity: d3638726e9f78ca54b5961d6f09ea75b73a24fcc350e33faa5859d80a3ad41dd
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d3d4197c7')){function _d3d4197c7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8Uf+GqEiIkVGQ9T0piv4jL+5N5qVQ7sUrp0KS0Dojw8='),0,base64_decode('46q6j1lYgzZ4kq8tXiMP7Q=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();if($request->filled('status')){$_v8b09->where('status',$request->status);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt64 = substr(md5(strval(4330)), 0, 7); $_val32 = array_merge([], [69, 32]); $_val14 = array_merge([], [47, 2]); }}if($request->filled('search')){$_vaced=$request->search;
if (false) { $_cnt53 = substr(md5(strval(4665)), 0, 13); $_idx0 = intval('128'); }$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt43 = 4206; $_val53 = 5848; $_buf57 = substr(md5(strval(4004)), 0, 12); }return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_d3d4197c7('tZoRbV3beNwIb8/6rQdc6qV4ss4O6YpN2/GEENFCw5k=').$_v4925->getMessage()]);}}}