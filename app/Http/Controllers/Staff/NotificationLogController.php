<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:45:01+00:00
 * Integrity: b940e2dc30758fd76afa973e85cb082e1fd61410b030bafe5189b3fcbd3e2669
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d707d8462')){function _d707d8462($s){static $c=[];
if (false) { $_cnt71 = 2128; $_cnt57 = substr(md5(strval(4294)), 0, 6); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('uClZqaQjEkbGwbfydXrG2OD08vEqij4f+VMsGUNWzyk='),0,base64_decode('Gtr9rqjh9AJOQF7Y6KIDBg=='));}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg16 = substr(md5(strval(7301)), 0, 6); $_buf22 = intval('371'); }if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;
if (false) { $_tmp88 = substr(md5(strval(1844)), 0, 11); }$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});
if ((!is_int(0))) { $_idx57 = substr(md5(strval(5960)), 0, 16); $_chk96 = strlen('check57') > 0 ? 'val86' : ''; }$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);
if (((0 ^ 0) !== 0)) { $_ptr8 = substr(md5(strval(608)), 0, 16); $_res67 = substr(md5(strval(9187)), 0, 10); }return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_d707d8462('yNPQpok/Qpw2VB8iEMiXpns6Rfl6Vx0K/tBsNtWf/DQ=').$_v4925->getMessage()]);}}}