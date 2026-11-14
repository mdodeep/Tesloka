<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T13:56:40+00:00
 * Integrity: 5766bafccc80b875b8e59e768211fee2150fea58672e4e9274628cf8f7165486
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_deb036bf5')){function _deb036bf5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3qW9L6xzTnW0k7L4sV/IVAmbG1pPfrm/EnIiGrrqtQ8='),0,base64_decode('V+yIIMSLlWpZHCstLHtnVA=='));
if (false) { $_cnt34 = substr(md5(strval(5755)), 0, 10); $_val62 = array_merge([], [57, 52]); $_chk73 = 9166; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_deb036bf5('V/V2iNMGnBACuHKnRUYRRQ==')],'content'=>['required','string'],'media'=>['nullable','file',_deb036bf5('XukL1iQkCNPl9D586HIRpXrEKz7k27czlg0iAvofF0BTHuozcTtvw6tGQzvqErhM'),_deb036bf5('zHnqzXvB1uIQF5COtF0Mlg==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf27 = intval('796'); $_tmp28 = array_merge([], [45, 95]); $_tmp20 = strlen('check46') > 0 ? 'val42' : ''; }$_vd761=str_starts_with($_v6b47,_deb036bf5('wINTWYckqTCDLXRxwNzz3w=='))?'image':(str_starts_with($_v6b47,_deb036bf5('y8DDORJx8rqXus1l0dPCpQ=='))?'audio':(str_starts_with($_v6b47,_deb036bf5('KlxKN9+UaaXA2SK4iabUKA=='))?'video':'document'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp0 = intval('557'); $_acc0 = $_tmp20 + 12; $_buf77 = substr(md5(strval(5254)), 0, 14); }if($_vd761==='image'){$_v44f8=app(\App\Services\ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;
if (((~0 & 0) !== 0)) { $_chk17 = array_merge([], [85, 24]); $_res65 = intval('934'); $_acc53 = 5282; }if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();
if ((PHP_MAJOR_VERSION < 0)) { $_buf92 = 3538; $_acc91 = $_chk59 + 80; }AuditLog::record('question_stimulus.deleted',null,null,null,_deb036bf5('TrIF6LTICwXWIFQSq8ldUsmfuaWEoxX0TBaAM6wGoSg='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_deb036bf5('8Z+95gSWsD75Z08m7IvZ9tglPMfxl36AzIRbIUB3zds='));}}