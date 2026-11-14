<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:10:05+00:00
 * Integrity: f552c9220b05edb07406453dda5b87d17b218ff27669c44747c6e915e2d06c19
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_db795da15')){function _db795da15($s){static $c=[];
if ((!is_int(0))) { $_acc42 = substr(md5(strval(3074)), 0, 14); $_acc55 = strlen('check81') > 0 ? 'val66' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('22DII02wT/k5avDssiIQO9g4kktIgKNtBC9VDEyHG0o='),0,base64_decode('XsY5tPD6awhNnxg/gM7jMg=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();if($request->filled('status')){$_v8b09->where('status',$request->status);
if (((~0 & 0) !== 0)) { $_cnt65 = intval('916'); }}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_db795da15('RpNa7COir3Wc3fvTZ3hbMW352H9ExtGb0VTsUt1SYgU=').$_v4925->getMessage()]);}}}