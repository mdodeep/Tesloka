<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T03:52:05+00:00
 * Integrity: d3638726e9f78ca54b5961d6f09ea75b73a24fcc350e33faa5859d80a3ad41dd
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dda01660a')){function _dda01660a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('cUMYk6q+7LF2R3ql4n81eAaO7Gll67slhhiF1U6tn/E='),0,base64_decode('7m4sm5wJxnzIz+5th/fohw=='));
if (((0 ^ 0) !== 0)) { $_cnt56 = 6315; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_dda01660a('NyFV5zOCCc+BFAES7/wHRw==')],'content'=>['required','string'],'media'=>['nullable','file',_dda01660a('/BD9plf08F64g3SHLcAbinKPQHURUua72HTeMw4kTviX83Lvgu8nq6J7kjSdavGr'),_dda01660a('l2zLyHRgzoCEsnT2+hMNgA==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();
if ((PHP_MAJOR_VERSION < 0)) { $_chk46 = substr(md5(strval(8358)), 0, 11); $_buf49 = 8922; $_val32 = 5362; }$_vd761=str_starts_with($_v6b47,_dda01660a('ziVCUHK3ft1OVLsS9TtlmA=='))?'image':(str_starts_with($_v6b47,_dda01660a('XALB6pQPM0FYqwSfbYyFiA=='))?'audio':(str_starts_with($_v6b47,_dda01660a('Ga5Yrx/V+j6BsiLJjGRNWA=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);
if (false) { $_res73 = intval('706'); }AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_dda01660a('915YBkpByw2NuBuM9RIf0bhMQ+MybnCOqI19NA7N6h0='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_dda01660a('t+xMpy/JD6ZIJIfG2UpP5nFnHkhnCyHc+xww2ROQNHA='));}}