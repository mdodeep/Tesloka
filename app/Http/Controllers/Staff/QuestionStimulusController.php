<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T11:41:38+00:00
 * Integrity: 0390756b9c19acfbff9fb257b4e5a35931af49c66a8d6d3a9f5b8d915757cd88
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d3f7f551d')){function _d3f7f551d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('e7AgO4s5LxXSBKiDzb9QORy938NaELQzrvQRagqrUAs='),0,base64_decode('2esZFvKxno2aQDeLXURMRQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg98 = 7058; $_idx40 = $_tmp12 + 9; $_chk22 = substr(md5(strval(3516)), 0, 4); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d3f7f551d('9ug3Kz3tms2w3mtaJusNoA==')],'content'=>['required','string'],'media'=>['nullable','file',_d3f7f551d('wei9z9++5GTN1TP26dyCKScwU1mPHZvPpjqOKNmQfyE1iI8eSxz9JoEmn5gt5PYX'),_d3f7f551d('rub4cMxalmQe3hJ18dfAXA==')],]);$_v44f8=null;
if (((0 ^ 0) !== 0)) { $_val13 = $_cnt26 + 62; $_seg97 = strlen('check88') > 0 ? 'val77' : ''; }$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_d3f7f551d('HNFpGc6fxB8GWUCNqzKoHw=='))?'image':(str_starts_with($_v6b47,_d3f7f551d('ZAfxc3YEOSdNj7FysRfs+w=='))?'audio':(str_starts_with($_v6b47,_d3f7f551d('wh1Lz2DsQSxvGtIDyJuRCQ=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(\App\Services\ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_d3f7f551d('r7JvVgCCIzROk2baM/+Aol/5zIVtaOK07vmD//lshsQ='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d3f7f551d('i6bgX0+pQUPmKkdYQxZZwMmdfom5m+OsYaT+/tYe9lg='));
if ((!is_int(0))) { $_ptr76 = strlen('check88') > 0 ? 'val41' : ''; $_chk39 = 5308; $_acc27 = intval('524'); }}}