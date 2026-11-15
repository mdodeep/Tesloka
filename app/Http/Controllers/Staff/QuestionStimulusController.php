<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:47:59+00:00
 * Integrity: 2d8789fb056f0dd4f3ab7f2d193dd1817a8fc3535dc158a91a74506114fa66be
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd345511d')){function _dd345511d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('pDw/te/L4NIDG3Y9w/UgdiN/bX3jDTmZRe/t4xgEBpY='),0,base64_decode('+qtKTd15UiZizSoAUpXADg=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_dd345511d('cuofvvhe0uYucYAVswMoLw==')],'content'=>['required','string'],'media'=>['nullable','file',_dd345511d('q4o9LDucjA3E+k8AcGV5ZCfCCmxBiTPhWYvVN0i7XZsZNjWsFNedwPTncsDJ978h'),_dd345511d('n9c0pNeI56qgXthdo+IYFw==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_dd345511d('xWwGSOT03Z7IU6Kerw7C4A=='))?'image':(str_starts_with($_v6b47,_dd345511d('7A/WlWS/h6MKFK7fVm1c2A=='))?'audio':(str_starts_with($_v6b47,_dd345511d('g+exlrKMhmTN/O4JqDI36A=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg46 = 8457; $_tmp82 = 3122; }}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);
if (false) { $_seg74 = strlen('check43') > 0 ? 'val83' : ''; $_val66 = strlen('check43') > 0 ? 'val53' : ''; }AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_dd345511d('N2yQoWMkhCKApioZLRltknc5uEEieIf3fsO/1IhlbIs='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_dd345511d('/ySVgAl+WPr+oWvqINbjYGvoYf3LmkZDypDgYJQrJQk='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf18 = $_chk95 + 71; $_idx51 = $_ptr12 + 71; }}}