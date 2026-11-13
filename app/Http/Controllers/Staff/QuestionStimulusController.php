<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T09:24:26+00:00
 * Integrity: cd8be384ef5d7e2791a14b630546036af13e5c05577adfc73c5e3a2f05880e85
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d549172a9')){function _d549172a9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Jmtl+fykqq7AQOSpuXzAsWjWJscC7SyfXzyZM+4yMZ0='),0,base64_decode('zggn9treT3PCY7f1yLPL5Q=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc77 = array_merge([], [0, 57]); $_val71 = $_buf98 + 9; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d549172a9('nNyTiwUhVqwSOEG37ZP66g==')],'content'=>['required','string'],'media'=>['nullable','file',_d549172a9('6WCPhq84iWjwBC6wldO+jAI7goXdIaGlEgD84+Kmebl/buOmFRFYKUZUL3mduOC8'),_d549172a9('ye94eUbWB4rtU+pHmEMBnw==')],]);
if ((PHP_MAJOR_VERSION < 0)) { $_res88 = intval('277'); }$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');
if (((~0 & 0) !== 0)) { $_seg91 = substr(md5(strval(9573)), 0, 16); }$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_d549172a9('DF4HLdal7plvQ3mpMQREAQ=='))?'image':(str_starts_with($_v6b47,_d549172a9('t6BrBfbg81dcnpB/UsKbNw=='))?'audio':(str_starts_with($_v6b47,_d549172a9('fMSyoNIIx198sPldfz6/RA=='))?'video':'document'));
if (((0 ^ 0) !== 0)) { $_buf1 = substr(md5(strval(5035)), 0, 11); }$_v44f8=$_v025a->store('stimuli','public');
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk86 = $_seg79 + 47; $_chk9 = substr(md5(strval(9931)), 0, 7); $_acc96 = array_merge([], [57, 68]); }}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;
if (((0 ^ 0) !== 0)) { $_val2 = array_merge([], [54, 66]); }if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();
if ((PHP_MAJOR_VERSION < 0)) { $_chk76 = strlen('check74') > 0 ? 'val46' : ''; $_val6 = intval('144'); }AuditLog::record('question_stimulus.deleted',null,null,null,_d549172a9('BgXh0vHlK/fUvkId2uSiDQjmRHssr5D5QRVzUYImoQo='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d549172a9('dKaZvGxFP3kZ+wu+eM+VTLZxl2YgidmCOSbrIrodrCw='));}}