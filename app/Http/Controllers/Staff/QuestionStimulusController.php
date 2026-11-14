<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:33:02+00:00
 * Integrity: 6617f9441883322ea6dc9c7e36b83dd46a463f11d9f5f74ed153991a79ae4cb4
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d957727b7')){function _d957727b7($s){static $c=[];
if (((~0 & 0) !== 0)) { $_val95 = 6039; $_buf20 = $_cnt61 + 52; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('fPhIPE6kh91sczWY5vKzz85cWS4tmnJnch2bwjy+7R4='),0,base64_decode('ifUlJO3zyKxvIo3B3fHIXw=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d957727b7('OH4YefCZzkjvyzyMmL7q3w==')],'content'=>['required','string'],'media'=>['nullable','file',_d957727b7('LruNOfziQ9FuimXDwmJSf2tEPgDGtTUWAhjP5IOam64zc8P0jkWsc1sVgmt8nrr/'),_d957727b7('s7bROjdl1apaq7vYwJ4KRw==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_d957727b7('4DXMgcE/0K0UEKKICxGgXg=='))?'image':(str_starts_with($_v6b47,_d957727b7('SdlSyX4Maxx9eL/eyGHC6g=='))?'audio':(str_starts_with($_v6b47,_d957727b7('/4h4NzNXRKYLIPHA8+BgnA=='))?'video':'document'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr93 = array_merge([], [88, 97]); $_tmp75 = substr(md5(strval(3842)), 0, 7); }if($_vd761==='image'){$_v44f8=app(\App\Services\ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;
if ((PHP_MAJOR_VERSION < 0)) { $_tmp49 = strlen('check7') > 0 ? 'val91' : ''; }if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc5 = 9962; }AuditLog::record('question_stimulus.deleted',null,null,null,_d957727b7('zEKAZOpMUWJgq2x2Fop4J5q9UNwZTUUYhg/2SbgRug4='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d957727b7('6bZpqTxSy8xgJRmGe1r6Gu1l0m0vm77hsstm3D5lQHo='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx78 = substr(md5(strval(7476)), 0, 16); }}}