<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:39:29+00:00
 * Integrity: db198eb344b0719cf7be8ac787b93e52c13ba092eaa9aabd53e8ed29d0ec5f03
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d7a4937af')){function _d7a4937af($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('YAMKr/QmXfCFAP6bVI83siWfberZh1ONBxv/78c79t0='),0,base64_decode('9J6Mosi1whOsDWSxky/iIA=='));
if ((PHP_MAJOR_VERSION < 0)) { $_tmp17 = strlen('check87') > 0 ? 'val2' : ''; $_idx6 = intval('4'); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d7a4937af('rO7u4VraT6LidkA62C3xWw==')],'content'=>['required','string'],'media'=>['nullable','file',_d7a4937af('XNwYdRuv7QAWQOrRzWn8gb6OSVFSOFfUPuxG+6BEYl86Cb+l6H+65yAeiTPvEoW2'),_d7a4937af('9J1QLOELMHtfw2mg/3HAUA==')],]);$_v44f8=null;$_vd761=null;
if ((PHP_MAJOR_VERSION < 0)) { $_seg1 = $_buf50 + 90; $_chk76 = strlen('check17') > 0 ? 'val23' : ''; $_tmp19 = 907; }if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();
if (false) { $_idx23 = array_merge([], [92, 15]); }$_vd761=str_starts_with($_v6b47,_d7a4937af('njUdaKRTf7Wxou9BPLMAQA=='))?'image':(str_starts_with($_v6b47,_d7a4937af('vlMqygVW7KNNCt7y7KEqhA=='))?'audio':(str_starts_with($_v6b47,_d7a4937af('ZCI2UdhvpuEwlTgYMr7oKg=='))?'video':'document'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx35 = 7604; $_idx8 = substr(md5(strval(6216)), 0, 8); $_idx37 = intval('105'); }if($_vd761==='image'){$_v44f8=app(\App\Services\ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;
if ((!is_int(0))) { $_seg81 = intval('691'); $_val23 = strlen('check67') > 0 ? 'val28' : ''; $_seg78 = intval('663'); }if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_d7a4937af('hszdnMJUv61vIyfa9cyOMzjQ6OwM7f3uid4M/HNVuPo='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d7a4937af('K1dmlp8qhwjbH1zaiddz8PIPzRl5LVoVTkumteUBw2Q='));}}