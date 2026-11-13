<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T14:56:37+00:00
 * Integrity: 48ea7b313529166dee117b7bd38ea4955a3d683cb26d869c92edd7d7b18f7062
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d7722ea98')){function _d7722ea98($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HiZ2g/RwQ6eNOiUH0Q/CBx2fzy/eYUaSdKwvzxKx9Ts='),0,base64_decode('zCwhOU8OM/m41/LXwte/dA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d7722ea98('fA7YrTo/PUwxJfaC/1x1WA==')],'content'=>['required','string'],'media'=>['nullable','file',_d7722ea98('JFQl5joxT4o4dYwQgB8V/zR5EKh6wS/b+RJ+fwC0I8vvbV06bcq/wGywvD4XD+Uy'),_d7722ea98('VY8u9YPLRVux5RkifTX4iw==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_d7722ea98('R8cCjQNWFtleAzo83i7DnA=='))?'image':(str_starts_with($_v6b47,_d7722ea98('2hSdn4fMyGUOSy4vym/pMg=='))?'audio':(str_starts_with($_v6b47,_d7722ea98('D/zosZ7TVKZNiv056bpNLg=='))?'video':'document'));$_v44f8=$_v025a->store('stimuli','public');}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);
if ((PHP_MAJOR_VERSION < 0)) { $_res36 = 5376; $_tmp30 = $_tmp8 + 63; $_val52 = intval('672'); }AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_d7722ea98('bXPJiZs4q4szivZ6XFPA0IIH+HI/Z9g2NEVn7GNd6fU='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg62 = intval('668'); $_buf2 = intval('547'); }return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d7722ea98('SAbZvJzw5GPMx/o1CY9oMxFj+cQIZbP8ZkssqwfBOxA='));}}