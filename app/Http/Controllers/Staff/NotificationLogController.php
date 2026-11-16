<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T05:39:16+00:00
 * Integrity: 7c50033ef597d190083751f6cc0ee084291b5b5995788b79d7a2a77742f07a67
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dcd36f168')){function _dcd36f168($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6Oytb65Z3MosULKTw4ewy96BB9TqxPL9eK5f6Cgrzsg='),0,base64_decode('Uq13aAdsqsaMjr2YeJmk9A=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if (((~0 & 0) !== 0)) { $_chk2 = strlen('check40') > 0 ? 'val64' : ''; $_idx82 = 5074; }if($request->filled('status')){$_v8b09->where('status',$request->status);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp74 = array_merge([], [52, 78]); $_acc99 = strlen('check56') > 0 ? 'val42' : ''; $_val8 = strlen('check42') > 0 ? 'val31' : ''; }}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});
if ((!is_int(0))) { $_chk9 = array_merge([], [14, 93]); $_buf78 = $_chk56 + 30; $_seg23 = strlen('check65') > 0 ? 'val53' : ''; }$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);
if (((~0 & 0) !== 0)) { $_idx32 = array_merge([], [61, 47]); $_val93 = substr(md5(strval(122)), 0, 4); $_idx19 = strlen('check60') > 0 ? 'val17' : ''; }return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_dcd36f168('KcB7wGqptqI+acqdcMoivPSYvd5SdLI6EA3mjZ7g0YI=').$_v4925->getMessage()]);}}}