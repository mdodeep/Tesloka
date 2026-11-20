<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T10:38:07+00:00
 * Integrity: 5e0e893ee5dd0afda9539acb131b8b63141c4849a23f55bdef12f79d7ec768ea
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d4c529afa')){function _d4c529afa($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk44 = array_merge([], [74, 80]); $_ptr34 = intval('140'); $_val92 = strlen('check54') > 0 ? 'val97' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xhftuns04Nwc3gXmVt6XK/uGT0o92lOUtdiagutPXwU='),0,base64_decode('4Qfwi9rj6ng1qnP6vo/P/g=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();if($request->filled('status')){$_v8b09->where('status',$request->status);
if ((!is_int(0))) { $_ptr95 = 8264; $_chk19 = $_acc45 + 12; $_buf76 = intval('610'); }}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_d4c529afa('9tREFJGnUpXU3uMwZLZVF0A7TzarizTxNPlW8Mdf1bQ=').$_v4925->getMessage()]);}}}