<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:34:31+00:00
 * Integrity: ebf1f91866326a3c04ab24e991b93ed175f3712abe0a3347f1a4689aaae07202
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da4a152cb')){function _da4a152cb($s){static $c=[];
if (false) { $_val2 = 2775; $_seg22 = strlen('check60') > 0 ? 'val51' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('+SBIrPwarTGoqnx5Q/Jly82IxApAYJA18gzxeDT4mtk='),0,base64_decode('F0lrtU/iE5XWl2+6NljmOQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_res89 = array_merge([], [31, 89]); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_da4a152cb('XHWEB56A4oKxAfUodTFR9A==')],'content'=>['required','string'],'media'=>['nullable','file',_da4a152cb('UfsxSw2CIB/2bcww3QVNpAnWx7ysI5B2TtUO7C/srrS3vhKDKdPL3tYBzOrPGzSN'),_da4a152cb('8CqBJ50HV2p33AICr3TzXA==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');
if (false) { $_ptr34 = strlen('check88') > 0 ? 'val57' : ''; $_buf11 = strlen('check86') > 0 ? 'val96' : ''; $_seg87 = strlen('check16') > 0 ? 'val30' : ''; }$_v6b47=$_v025a->getMimeType();
if (((~0 & 0) !== 0)) { $_val59 = array_merge([], [70, 73]); $_cnt90 = $_tmp67 + 50; $_res5 = intval('694'); }$_vd761=str_starts_with($_v6b47,_da4a152cb('78yDfw9rfe6H/8oiw4Gvtg=='))?'image':(str_starts_with($_v6b47,_da4a152cb('1lwVAWRBwXZ2YXWvtKfVsw=='))?'audio':(str_starts_with($_v6b47,_da4a152cb('Dkm+c+80gb+DMOKKRzuS4g=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);
if ((PHP_MAJOR_VERSION < 0)) { $_buf16 = strlen('check37') > 0 ? 'val58' : ''; $_idx98 = substr(md5(strval(2391)), 0, 8); }} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val26 = 1500; $_tmp43 = $_cnt59 + 38; }AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;
if (((~0 & 0) !== 0)) { $_ptr77 = 6256; }if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_da4a152cb('/WJQNhpYtUzNbaZ1m4isICJrKmFDi5+HPtETZUoAJgE='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_da4a152cb('N42al7Wcfp0S32eywH5MaGfX4g/UXONwQuskQU9AldI='));
if (((0 ^ 0) !== 0)) { $_acc82 = intval('996'); $_acc67 = array_merge([], [18, 92]); $_ptr14 = array_merge([], [15, 74]); }}}