<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:23:31+00:00
 * Integrity: 0fc568f4ba4da30bba9c07ba10466fcbbd923ab1e1fb4a8258d0fef9ced27354
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d80052fe8')){function _d80052fe8($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('GyhjPvrgN+d3dUxoVJHXjwO7psTRxmXQsyPJWucIPl4='),0,base64_decode('XPjkw2Ba5cP3vzEAjrqegw=='));
if (false) { $_tmp36 = substr(md5(strval(470)), 0, 6); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d80052fe8('8auLxfpDoA9Qr7o39Irqtg==')],'content'=>['required','string'],'media'=>['nullable','file',_d80052fe8('UrfhOiQ6LkcWlyRHZAHs4M5ZbixeDA/yDAStxBX2eJCoCkX/OKNY4YYJNP4iiP1P'),_d80052fe8('n6BlHIWXZGafAymXdt2tbg==')],]);
if (false) { $_val43 = array_merge([], [85, 54]); $_chk30 = 6724; }$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');
if (((~0 & 0) !== 0)) { $_ptr4 = substr(md5(strval(3045)), 0, 9); }$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_d80052fe8('s3O5grD/gITGWt//5YobMg=='))?'image':(str_starts_with($_v6b47,_d80052fe8('6Fe5Q45ya/DeviEpLsc6qA=='))?'audio':(str_starts_with($_v6b47,_d80052fe8('JAYg/pgjLuAA9TTWkkftIw=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_d80052fe8('grmSVF8918jRDRBdaqoY1PIdJSjIWyucZSnOfMzWn+4='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d80052fe8('KfUMfnmERVQSadlPBgzUIio4YCmslqVtun7Asrm7aXU='));}}