<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:10:05+00:00
 * Integrity: f552c9220b05edb07406453dda5b87d17b218ff27669c44747c6e915e2d06c19
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d1d25222c')){function _d1d25222c($s){static $c=[];
if (((~0 & 0) !== 0)) { $_seg86 = intval('682'); $_ptr96 = substr(md5(strval(5523)), 0, 12); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wrKlwTuge/YSXI6kbiCf0pt1lCkXO5zLh/ZCXT5x9v0='),0,base64_decode('sKUu2YP00jShE2Y00sNMuQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d1d25222c('G5/a/DUVSNEIKrrSG+ragQ==')],'content'=>['required','string'],'media'=>['nullable','file',_d1d25222c('0jx0zCaBy15ErrntryHNIGAFSIQnuZB7JbiQErKHJC/o5PHCP5f43+LOtFnVws3/'),_d1d25222c('ruBLKk5zsxO7VK30wxfQ2Q==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();
if (false) { $_tmp65 = substr(md5(strval(9680)), 0, 5); }$_vd761=str_starts_with($_v6b47,_d1d25222c('F+iJHTm6DVc1cJoutrdAPQ=='))?'image':(str_starts_with($_v6b47,_d1d25222c('SDrrQ7FOHPadOqC37bEvzg=='))?'audio':(str_starts_with($_v6b47,_d1d25222c('Vo6Wt7ft9rdSu3O9uutrSA=='))?'video':'document'));
if ((PHP_MAJOR_VERSION < 0)) { $_res87 = intval('460'); $_ptr86 = $_ptr71 + 38; }if($_vd761==='image'){$_v44f8=app(\App\Services\ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;
if ((!is_int(0))) { $_chk52 = array_merge([], [55, 92]); $_res38 = 6569; }if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);
if ((!is_int(0))) { $_tmp63 = 6553; $_acc85 = intval('230'); $_idx32 = substr(md5(strval(6056)), 0, 12); }}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_d1d25222c('RGJ/GC8jwgfsSNvgN8eGr0r9gfUKNDAJx1cyrVZga1c='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d1d25222c('ZbmoijF8+X/t24Y7JiWyTBP6WyBq5AYvj+hkYVvQ90g='));
if ((PHP_MAJOR_VERSION < 0)) { $_seg55 = array_merge([], [76, 98]); $_idx39 = 6356; $_val21 = array_merge([], [14, 25]); }}}