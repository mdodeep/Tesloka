<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:05:25+00:00
 * Integrity: 6bf75b5f50a067a401c4a59875f80ad2c41b597675022667189ae77fbdbcf9e0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dbcfbe2a3')){function _dbcfbe2a3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('uDSrtc+MH+nG+nyNZ+Gsln04ZxQBNfRPTcrDKyxI5sg='),0,base64_decode('MjPoaB37opYtPGJMn+Mmmg=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk93 = strlen('check78') > 0 ? 'val11' : ''; $_tmp18 = substr(md5(strval(7405)), 0, 15); }}}
use App\Http\Controllers\Controller;use App\Models\EmailDeliveryLog;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Mail;use Illuminate\View\View;class NotificationLogController extends Controller{public function index(Request $request):View{$_v8b09=EmailDeliveryLog::query();
if (false) { $_chk57 = array_merge([], [55, 21]); $_ptr70 = strlen('check32') > 0 ? 'val81' : ''; $_buf45 = intval('880'); }if($request->filled('status')){$_v8b09->where('status',$request->status);}if($request->filled('search')){$_vaced=$request->search;$_v8b09->where(function($_v6985) use($_vaced){$_v6985->where('recipient_email','ilike',"%{$_vaced}%")->orWhere('subject','ilike',"%{$_vaced}%");});}$_v88c8=$_v8b09->orderByDesc('id')->paginate(20)->withQueryString();$_v1e04=['total'=>EmailDeliveryLog::count(),'sent'=>EmailDeliveryLog::where('status','sent')->count(),'failed'=>EmailDeliveryLog::where('status','failed')->count(),'pending'=>EmailDeliveryLog::where('status','pending')->count(),];return view('staff.settings.notification-logs',['logs'=>$_v88c8,'stats'=>$_v1e04]);}public function retry(EmailDeliveryLog $log):RedirectResponse{try{Mail::raw("Halo,\n\nIni adalah pengiriman ulang pesan sistem TESLOKA CBT:\n{$log->subject}\n\nWaktu: ".now()->toIso8601String(),function($_ve47a) use($log){$_ve47a->to($log->recipient_email)->subject($log->subject);});$log->update(['status'=>'sent','error_message'=>null,'sent_at'=>now(),]);
if (((0 ^ 0) !== 0)) { $_ptr68 = $_acc48 + 38; }return back()->with('success',"Email ke {$log->recipient_email} berhasil dikirim ulang.");} catch(\Throwable $_v4925){$log->update(['status'=>'failed','error_message'=>$_v4925->getMessage(),]);return back()->withErrors(['error'=>_dbcfbe2a3('Z25PysvN3wpO5ZOAC/vQLpc4cDOklEQTLEcDq1LLmQI=').$_v4925->getMessage()]);}}}