<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T11:11:47+00:00
 * Integrity: 882f55aec517e9c0f8ea4fdf5b9f2860fcdaa027af633290f3a236ea81035c1f
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d420aa92c')){function _d420aa92c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hvjryR/VbasEuN1KjExloZJdo8dPuPNw86ipy1H8fig='),0,base64_decode('DWHVRwEbKF57qqySHwIa3Q=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d420aa92c('8Dt4zQLr1gPkhIZMZmNjsA==')],'content'=>['required','string'],'media'=>['nullable','file',_d420aa92c('fLjMVAZOtbhdg0sjZN9SePD1jB/qDwRoCBc/7gxSNNfmCOX3AYJurJMiWeiHlIec'),_d420aa92c('a0iLemcfJQYlq7ulz17pUg==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_d420aa92c('OsAIBKs5e40U5xqEAn1JZQ=='))?'image':(str_starts_with($_v6b47,_d420aa92c('ZohzCUHZTDmqUho17jZa/w=='))?'audio':(str_starts_with($_v6b47,_d420aa92c('EQ+mVYJvBWBbE6xs54HSaA=='))?'video':'document'));$_v44f8=$_v025a->store('stimuli','public');}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);
if ((!is_int(0))) { $_buf2 = intval('747'); $_idx67 = intval('27'); $_chk96 = 2254; }}$stimulus->delete();
if ((PHP_MAJOR_VERSION < 0)) { $_val31 = strlen('check29') > 0 ? 'val71' : ''; }AuditLog::record('question_stimulus.deleted',null,null,null,_d420aa92c('9Li1sOPKKtxOYCYTGQDfOQIyludEgb36jcIpYqVYsIo='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d420aa92c('0tWTx3Z/6wpzdqGUdI3uzDypVNJQ+GN5yvCX4BPApUM='));}}