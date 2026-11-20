<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:12:52+00:00
 * Integrity: 2e1eabbbd8b36f2de70e80101eaa4052c88ee587c718c5423c3f7afae07bf57f
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d9cf4776f')){function _d9cf4776f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ZGmQOaw1AlXa2eqGWfP9QT31pziA7rSw+TTNUF7WjDQ='),0,base64_decode('UTXRk6ssWsvDBbmosh+liQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf85 = strlen('check78') > 0 ? 'val41' : ''; }}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});
if (((0 ^ 0) !== 0)) { $_seg5 = array_merge([], [21, 45]); }$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res1 = array_merge([], [76, 56]); }return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_d9cf4776f('PWNV0cljetpJQEGLfVPNAgmgPacVP5YelrXHlh21rpI=').$_v4925->getMessage()]);}}}