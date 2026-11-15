<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:18:25+00:00
 * Integrity: 30350d0d407133c60dc35f647df51f0d7b9b92c945b39e777451cd0a62c3a458
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d8b70a96d')){function _d8b70a96d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('x7eoG7byHYxzO4pZUchuG384mMgO2xgR3vhZYec5LGM='),0,base64_decode('HpYNFZRLmE3teVKYk2KNYQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d8b70a96d('C/Jm9WYt6xFGZY6EILYuFA==')],'content'=>['required','string'],'media'=>['nullable','file',_d8b70a96d('ekl7zxxmteWghm28W4yyjIfZogwuKjHu74z2Kl9TK0AggW5tAXHgSCxhClfq+PGs'),_d8b70a96d('jaTVHIsD/I/qQKpOsgcczw==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');
if ((PHP_MAJOR_VERSION < 0)) { $_ptr98 = $_tmp63 + 32; $_tmp66 = intval('152'); $_res73 = 8208; }$_v6b47=$_v025a->getMimeType();
if ((PHP_MAJOR_VERSION < 0)) { $_ptr14 = strlen('check89') > 0 ? 'val46' : ''; }$_vd761=str_starts_with($_v6b47,_d8b70a96d('kbVjX1df32kvmYOfTxfb5Q=='))?'image':(str_starts_with($_v6b47,_d8b70a96d('01C28kHrA66N9E+v3JA+SQ=='))?'audio':(str_starts_with($_v6b47,_d8b70a96d('eXDVb3AGhuf5thkLEZBMzA=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_d8b70a96d('+sg78RQEgzyLMmKDmefN95PexRnCqNmTgS8Qc279of0='));
if (false) { $_acc82 = strlen('check25') > 0 ? 'val68' : ''; $_cnt22 = $_acc45 + 45; }return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d8b70a96d('tVlleqIBD/FOupfHhkqKioDKdmLPZCSOuPtNHOEtoNA='));}}