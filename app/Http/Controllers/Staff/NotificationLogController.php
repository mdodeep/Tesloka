<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:57:15+00:00
 * Integrity: 65e43bf6a4c29af18923f0d8525195efce90967c02a31016cfca55d63e64d572
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dc81539d5')){function _dc81539d5($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_seg27 = intval('722'); $_idx64 = $_chk76 + 71; $_idx36 = array_merge([], [14, 76]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Gwl8La13vWKmMQh/OPRsRSq7e1aJyzjTT/Td9Ljhi94='),0,base64_decode('IC9qT+tVx4n0Bk1c31WuUA=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if ((PHP_MAJOR_VERSION < 0)) { $_res26 = array_merge([], [99, 27]); }if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_dc81539d5('mDaOuAP5vq5hrkqX8/5hHaIvmVlxKNnR8AQbAqv/2gM=').$_v4925->getMessage()]);}}}