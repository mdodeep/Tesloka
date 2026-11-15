<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:14:13+00:00
 * Integrity: 18b57aa627fd74aee36ec4e10d76eb437cbf3e3f51cf591ed361ffcb18cf37ac
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d9e90bf06')){function _d9e90bf06($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('rZbR0Ap2n6X7/amY7kKjtsILkfe0cYl6j4PJ8dRoVVE='),0,base64_decode('U7WXyNHnqXDVw8ZkGG3BCw=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d9e90bf06('eOshjbYbibeasVhyPus8hg==')],'content'=>['required','string'],'media'=>['nullable','file',_d9e90bf06('k245wxNUzc7jIBY0CIZdoeww8mBTNRlG0CenhwgUYpEfm1h7eVT2z/TD94bY1z67'),_d9e90bf06('60AkZlzVtnaGrapyUXKhiw==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_d9e90bf06('CgUwu8nNsZPFFPZzwDEvzA=='))?'image':(str_starts_with($_v6b47,_d9e90bf06('NIEJalSIBgg0CAx/zuVvEg=='))?'audio':(str_starts_with($_v6b47,_d9e90bf06('naAvuAIJILTlahrwJhf6bQ=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');
if ((!is_int(0))) { $_buf5 = array_merge([], [41, 80]); $_idx64 = 8730; }}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;
if (((0 ^ 0) !== 0)) { $_acc49 = substr(md5(strval(9557)), 0, 5); $_seg41 = intval('548'); $_buf88 = array_merge([], [67, 58]); }if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp89 = array_merge([], [97, 53]); }AuditLog::record('question_stimulus.deleted',null,null,null,_d9e90bf06('BEwsQtxcvR5+MlYwk8MpnnRXselzTpIpt8UoOj9sTtQ='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d9e90bf06('IfN4gUI4KPrvwkscvHvr08uJmvUQPahSyvdL4lwXSIw='));}}