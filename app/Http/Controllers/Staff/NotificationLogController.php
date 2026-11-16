<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T16:48:10+00:00
 * Integrity: 04ffaf636ee12913df2f2d8d61787bdf1d31fe684bdb3c318a2fd204084cd70c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_db12ae1b2')){function _db12ae1b2($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_idx73 = $_tmp24 + 51; $_val28 = substr(md5(strval(4257)), 0, 9); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('QEmmtF0tabxY1qfpSjACxzlX5yih/DciQJ57sKr6cHk='),0,base64_decode('1Dv1Kww0MpU+yG2iDEDlwg=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();if($request->filled('status')){$_v8b09->where('status',$request->status);
if (false) { $_idx75 = intval('289'); }}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});
if (((0 ^ 0) !== 0)) { $_tmp55 = $_val23 + 48; $_acc63 = $_seg71 + 34; }$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_db12ae1b2('nGLnDde3aH6HQ8lKUobVjGnuDS6JO7oDbKb9pIQD6vo=').$_v4925->getMessage()]);}}}