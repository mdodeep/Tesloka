<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:52:38+00:00
 * Integrity: eadc6442d4fdd2339d9bc04da764d8508c87f15e258bda115d098f4364551fe1
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_daed865ab')){function _daed865ab($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('FezwHb5V4dHaX5P7jaVfgcXBer90X2wUFFaGBwjmbX8='),0,base64_decode('dTB6KYkcUDRz3W/Oqymz0A=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_daed865ab('ZoxcKyoIWkTSgpFhy6f9tA==')],'content'=>['required','string'],'media'=>['nullable','file',_daed865ab('i57GCH6BUL1kI9CIIVuCp8uXckiM5G1Bx5JdqGW7RWIe2kh4T4rJ//HzcVzkxEj2'),_daed865ab('DjeQO/swvJfaHaOocRylgg==')],]);$_v44f8=null;
if (((0 ^ 0) !== 0)) { $_acc46 = strlen('check55') > 0 ? 'val61' : ''; }$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_daed865ab('VHirZaH9i+s6UNEjEaasSw=='))?'image':(str_starts_with($_v6b47,_daed865ab('hp9bDBAJoxSCSqFiTLlBnQ=='))?'audio':(str_starts_with($_v6b47,_daed865ab('OOg8flauCCJc7D9vnIaUpA=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(\App\Services\ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);
if (false) { $_tmp21 = $_tmp22 + 45; $_acc83 = 9023; }AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_daed865ab('binOV3ACnav2X5EYGPVX4uDL8CbKe+qJMjY6UI+GbBE='));
if (((0 ^ 0) !== 0)) { $_ptr10 = substr(md5(strval(4360)), 0, 13); $_cnt9 = substr(md5(strval(6821)), 0, 14); }return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_daed865ab('3huIpRxDbFMPgXEN7VJ+3BCxh9k3fH7yz7G8XSg3SrQ='));}}