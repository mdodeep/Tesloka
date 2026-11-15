<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:55:36+00:00
 * Integrity: d14550d7fd40bab3182de50c2bf5702a2c32f34da7ecba3b371eaa8fa965aa87
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da0493b11')){function _da0493b11($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt39 = substr(md5(strval(8959)), 0, 5); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Vb3dm+e/0LwJ/HWP+yaISyhWd0sQ2+G1hP3BZta4Juw='),0,base64_decode('Yvp90ix42f/5NjfTJXtF1g=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_da0493b11('hmBdBqLwKUwSNsz+qEn8yw==')],'content'=>['required','string'],'media'=>['nullable','file',_da0493b11('F2eafbaI7CvXT1OJk5kReMR7yCxYPDXqCGuyLEuk+M8fa9jbD7nTKMlfvrVVTM27'),_da0493b11('uFEnxLbhu+09zgpvDhYWgA==')],]);
if ((PHP_MAJOR_VERSION < 0)) { $_buf52 = intval('217'); $_res98 = strlen('check65') > 0 ? 'val5' : ''; }$_v44f8=null;$_vd761=null;
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg28 = $_chk22 + 29; }if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc21 = 1223; }$_vd761=str_starts_with($_v6b47,_da0493b11('iexS+9JarU296brtIykzGw=='))?'image':(str_starts_with($_v6b47,_da0493b11('hyKf9z31lRkBrRIDfKw0ug=='))?'audio':(str_starts_with($_v6b47,_da0493b11('WZjh6ScMdom/SJdAYr3rLA=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);
if ((PHP_MAJOR_VERSION < 0)) { $_acc38 = strlen('check87') > 0 ? 'val9' : ''; }} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);
if (((~0 & 0) !== 0)) { $_acc29 = strlen('check17') > 0 ? 'val16' : ''; }AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);
if ((!is_int(0))) { $_tmp93 = array_merge([], [37, 42]); $_cnt86 = intval('573'); $_cnt30 = intval('287'); }}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_da0493b11('gKawOFJqLm9mNPowjRC9Txt+RtSaH5pS1gONWY0MOLI='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_da0493b11('uDuklzpiW83L/pN2vegjmFlMcFmLzU2GjSOnGUNmz7Y='));}}