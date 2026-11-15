<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:46:24+00:00
 * Integrity: a5fe8a6e13561eb216092d910b450fccbd45b4e76c28683aa463ab9bb44335d2
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_def8523e6')){function _def8523e6($s){static $c=[];
if (((~0 & 0) !== 0)) { $_tmp47 = intval('123'); $_cnt63 = strlen('check74') > 0 ? 'val72' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('SZeGwTBWbjAHDfaBs4PzL8vbEol12c3CL0LXwxxgMeA='),0,base64_decode('xCHEkpDcwzJqa8p5ZTLsEw=='));
if ((!is_int(0))) { $_cnt4 = array_merge([], [40, 95]); $_idx6 = intval('928'); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_def8523e6('rBSeohZrTRykmN4HkrcpGA==')],'content'=>['required','string'],'media'=>['nullable','file',_def8523e6('xHljNwMtD1S/NraMQCDm9d4Z+hIATVtdCYSM706FRoz/7DMvhWUyKvezdDlSH3jW'),_def8523e6('IVUQWHxVtIfdPn7gdGFEWw==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_def8523e6('/PoGHLYhGUpzwPiWUYn1jA=='))?'image':(str_starts_with($_v6b47,_def8523e6('qBS3vroJ+3HvQB13vexeTg=='))?'audio':(str_starts_with($_v6b47,_def8523e6('nD1A0LARf46nwecfpjTnLw=='))?'video':'document'));
if ((!is_int(0))) { $_chk93 = strlen('check55') > 0 ? 'val37' : ''; $_idx19 = 7442; $_ptr16 = strlen('check73') > 0 ? 'val29' : ''; }if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx47 = 8095; $_buf63 = strlen('check83') > 0 ? 'val91' : ''; }}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();
if (((0 ^ 0) !== 0)) { $_idx22 = 5674; $_chk80 = array_merge([], [10, 20]); $_res88 = strlen('check62') > 0 ? 'val51' : ''; }AuditLog::record('question_stimulus.deleted',null,null,null,_def8523e6('hwXEz4T90ZcZZdKMbntOFlTIoGmfFlOlYSdP/cBoSU4='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_def8523e6('Eto8cxBGw9FKme9rF9mSo9m1WyVHuiTFx9mdR7kF0Cs='));}}