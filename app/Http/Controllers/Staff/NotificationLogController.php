<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:34:31+00:00
 * Integrity: ebf1f91866326a3c04ab24e991b93ed175f3712abe0a3347f1a4689aaae07202
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_daa58fe6d')){function _daa58fe6d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zdKCtiQYr/MjkSPr+GwxFauLuq0vZouI6tPy6RrmqDA='),0,base64_decode('wFXf8oFfkezqpqiHYIxm7g=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc11 = substr(md5(strval(5428)), 0, 16); $_val64 = strlen('check5') > 0 ? 'val66' : ''; $_seg38 = strlen('check5') > 0 ? 'val72' : ''; }}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if (((~0 & 0) !== 0)) { $_val98 = substr(md5(strval(2342)), 0, 10); }if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_daa58fe6d('nlsKhFw6RVRBdrbNQd0FlTgBKa6xMCTzhuB5AoY1Kqs=').$_v4925->getMessage()]);}}}