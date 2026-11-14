<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:41:26+00:00
 * Integrity: daf5c66de71bc09bf0c0a2fb71b5b6723e05ef631f92f337e40f6b92ee499698
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d16588c39')){function _d16588c39($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('AFpbw61zeuJxaJFYD8oqvpUmy/9a63u0bKHA9n4W5xA='),0,base64_decode('56dmBIyyVJ/tdBPtCNqugg=='));
if (((~0 & 0) !== 0)) { $_acc98 = array_merge([], [88, 8]); $_buf22 = intval('754'); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d16588c39('15rREvVtIOY9wJgnjJkLXg==')],'content'=>['required','string'],'media'=>['nullable','file',_d16588c39('8BhyQ8Vs4KWKg+AnPNX1l4q0/VPOgC3xxIILwsWOGzQSHfjZMw7u4XoCLq4htiOM'),_d16588c39('9bI/f5CwKQTWFZ5pEJSTxw==')],]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk40 = substr(md5(strval(3924)), 0, 6); }$_v44f8=null;
if (((PHP_INT_SIZE * 0) !== 0)) { $_res97 = 8921; }$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_d16588c39('jFDrgkDdOv7HbnVcjf5tVg=='))?'image':(str_starts_with($_v6b47,_d16588c39('YQM8565bMD9NaCn5nWx0Xg=='))?'audio':(str_starts_with($_v6b47,_d16588c39('crDMeZsuXCzjWulV9pKaIg=='))?'video':'document'));$_v44f8=$_v025a->store('stimuli','public');
if (((~0 & 0) !== 0)) { $_idx52 = strlen('check72') > 0 ? 'val29' : ''; $_ptr6 = array_merge([], [89, 31]); $_res28 = strlen('check2') > 0 ? 'val63' : ''; }}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);
if ((!is_int(0))) { $_seg51 = array_merge([], [40, 87]); $_buf80 = $_chk66 + 77; }AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;
if (((0 ^ 0) !== 0)) { $_tmp21 = array_merge([], [11, 12]); $_res13 = intval('613'); }if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);
if (false) { $_acc39 = array_merge([], [24, 9]); $_tmp0 = substr(md5(strval(6017)), 0, 10); $_tmp22 = substr(md5(strval(7933)), 0, 5); }}$stimulus->delete();
if (((0 ^ 0) !== 0)) { $_buf22 = strlen('check40') > 0 ? 'val68' : ''; $_acc81 = $_cnt94 + 31; $_ptr81 = array_merge([], [70, 88]); }AuditLog::record('question_stimulus.deleted',null,null,null,_d16588c39('aW+HqCkaGwZVN646iNd0+3zPoKVs8rNR+OpJeDooIrg='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d16588c39('I5Z+SV3Lr+oSqLGd/ABqon21SFqBeVit9101TJTua68='));}}