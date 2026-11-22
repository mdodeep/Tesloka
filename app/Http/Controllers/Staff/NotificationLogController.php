<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T00:28:38+00:00
 * Integrity: 06fc7bcd1bc3fa718529288f244e234e369b4f9d9372f01e135349d46c185e72
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d53cf9a77')){function _d53cf9a77($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7BFhRyPVkGWcu7L8HgJkxvTZIOPuGKEjwLnLiXF6uDY='),0,base64_decode('+AZnafh/MF3zX0q+Z3Zhmg=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();if($request->filled('status')){$_v8b09->where('status',$request->status);
if (((0 ^ 0) !== 0)) { $_val39 = $_tmp7 + 87; $_idx2 = strlen('check39') > 0 ? 'val61' : ''; }}if($request->filled('search')){$_vaced=$request->search;
if ((!is_int(0))) { $_tmp17 = substr(md5(strval(6067)), 0, 9); $_acc67 = array_merge([], [79, 83]); }$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_d53cf9a77('qKj0snjhh2V81mSTZm9O3wVUBp1v4souHDHE2jOLN6Q=').$_v4925->getMessage()]);}}}