<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:38:34+00:00
 * Integrity: f5de456ce7b5a3ffff444b8d6e857cd97d6610ca1b6892c02107dfc3b0b527ec
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_db762b66b')){function _db762b66b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('u3G/9ubuBw4EgQ2SS5gVM7kXXsIWZxYlnneMfA+S/qo='),0,base64_decode('9wHiKEwk3By9QpgNREKS0g=='));
if (((0 ^ 0) !== 0)) { $_buf32 = $_ptr30 + 96; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_db762b66b('pE8ii2Kb9/Hpfzqb+BT06w==')],'content'=>['required','string'],'media'=>['nullable','file',_db762b66b('O3xup3yg1bEF+x6SYt+nQ2mp1dOFbw+NIYEcrPPBeHF/bt3bUqv8ZhRWHyhQb5yh'),_db762b66b('r1FwNQQi7WbQR1IbAlMWJw==')],]);$_v44f8=null;$_vd761=null;
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx19 = 4035; $_acc89 = array_merge([], [11, 72]); $_seg7 = substr(md5(strval(1813)), 0, 7); }if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_db762b66b('xMYoN4yF75T0j/C6h0XIsw=='))?'image':(str_starts_with($_v6b47,_db762b66b('0NjwabH2+tCjq0Mz19yzTQ=='))?'audio':(str_starts_with($_v6b47,_db762b66b('swi3jV2IzdgZVZUUm4G/iw=='))?'video':'document'));
if (((0 ^ 0) !== 0)) { $_acc92 = array_merge([], [98, 27]); }if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_db762b66b('AlUb3S9oN1tdiCOCnvz1Lsw7hjA5FHnkBy4tnETJL5Y='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_db762b66b('kjKg9Jo5Z45aN/2W6jdqvICjmrscI4WOTTXjFP1Q9sI='));}}