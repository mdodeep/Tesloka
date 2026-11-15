<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T01:48:53+00:00
 * Integrity: 2b02e96a3b668b5091b70acb55324e853532ac96032889cccec9afa6dfd25cd0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dae3bdc96')){function _dae3bdc96($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ivDO7UXEtOKWc2TVuzsUxn48hzmIX5bG6a8C1rVbcDU='),0,base64_decode('6TWmUmU3MF7nMOO3hfvTZg=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_dae3bdc96('K0UDXDDFs+5Dge868/MtcA==')],'content'=>['required','string'],'media'=>['nullable','file',_dae3bdc96('7Ys77BXULSekEq99i97/RiWD3T/HsCNFgFZM5FYsuBfaKXEUx01SQvAiRLcM/UOK'),_dae3bdc96('Ak8x7w/ABVEmtPz54o8sng==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_dae3bdc96('6RTTuhD7mDoKqmWFdokTCg=='))?'image':(str_starts_with($_v6b47,_dae3bdc96('lxCGcb4CbH78vwWEdzUl7g=='))?'audio':(str_starts_with($_v6b47,_dae3bdc96('FqIh8J0JE250e8kh7KkSxQ=='))?'video':'document'));
if ((!is_int(0))) { $_tmp8 = 2468; $_seg25 = intval('78'); $_cnt86 = intval('773'); }if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;
if ((!is_int(0))) { $_res96 = $_buf88 + 18; }if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_dae3bdc96('rcCLiEjDLxAFHIw6NPq71IKX/Wa03Jw1YpgWsvpXZ0E='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_dae3bdc96('K6qNzsvVX9B/xGqqI0kNAib14Zs0g6ncudMTIUkecyE='));}}