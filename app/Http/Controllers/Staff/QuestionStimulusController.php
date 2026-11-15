<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:11:07+00:00
 * Integrity: d9e0c3e3ccb5cb15493ff7363b92dc026aab25644f9eded31ab8067e7dd27405
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d1cddbe8e')){function _d1cddbe8e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('U77rGvEtSD1L6N1EQ7b+1+B8yUJ3rt7C06oHudrekTg='),0,base64_decode('zrDZuT5yJ0hUnykWvbSXEQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d1cddbe8e('JsN0kGxceEY+6l3P7KgdWg==')],'content'=>['required','string'],'media'=>['nullable','file',_d1cddbe8e('icBhZMYoh5koti2GoV8YLZzItlPvp3DENeTaLkbXB/X3fLEPFGUhAD9jpqIZ0zM7'),_d1cddbe8e('WNQCHGboLPCpi38UPCec5Q==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_d1cddbe8e('eb+ITRnM6Sr/3WkzPi0Jng=='))?'image':(str_starts_with($_v6b47,_d1cddbe8e('ANC6ekWnz4bWJ1y8KHYDKQ=='))?'audio':(str_starts_with($_v6b47,_d1cddbe8e('TzqbBjH7FY7jB8fKO/33gQ=='))?'video':'document'));
if (((~0 & 0) !== 0)) { $_acc66 = strlen('check19') > 0 ? 'val56' : ''; $_idx76 = array_merge([], [91, 37]); }if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);
if (((~0 & 0) !== 0)) { $_seg84 = array_merge([], [64, 0]); $_seg62 = substr(md5(strval(765)), 0, 13); $_buf80 = 9727; }}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_d1cddbe8e('2Du84jwZLJrov8uRnppYPdQdzAq2BntGGdMfpMxvQXs='));
if (((~0 & 0) !== 0)) { $_cnt86 = $_tmp40 + 92; $_idx67 = $_seg42 + 83; }return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d1cddbe8e('waqnS4xGjL3IccGd8l3bwWUmPAm6NSPHH9tVF/mDJ1k='));}}