<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:45:28+00:00
 * Integrity: d8d50151664cd5e9171c0571737d97b823c3a8834b7a545e6b01c8ef1911e6de
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d3dc91b45')){function _d3dc91b45($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('PqB344SBH3mcWl7kT7I9/1I/yLUiUy396PE5oetB4BU='),0,base64_decode('t9VIDTGyGSeIChcnWt+Vmw=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d3dc91b45('bdUDj3QtrboWfoNcTikbEQ==')],'content'=>['required','string'],'media'=>['nullable','file',_d3dc91b45('LKhavLl1DUky9rger8kgpfiI8yCDlZ3b1kQX5hipVzWvnc0rGa3+mziaf8+jQNew'),_d3dc91b45('TSCU9Khyy7HiH1OZpXZ2wQ==')],]);
if (false) { $_idx68 = 1018; $_tmp12 = substr(md5(strval(3171)), 0, 12); }$_v44f8=null;$_vd761=null;
if ((!is_int(0))) { $_tmp7 = array_merge([], [90, 49]); $_res33 = $_buf52 + 20; }if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt38 = $_val95 + 41; }$_vd761=str_starts_with($_v6b47,_d3dc91b45('Orfu26tvpjBy2LoM37r3mA=='))?'image':(str_starts_with($_v6b47,_d3dc91b45('Wzc9ULMLMNShWZWDJ64r8g=='))?'audio':(str_starts_with($_v6b47,_d3dc91b45('c0OLsS5LRf0BODIPFI+2kg=='))?'video':'document'));$_v44f8=$_v025a->store('stimuli','public');}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_d3dc91b45('wYV3GCuH4S1DfKcn8JOAYV/labXgo4IGagsYZ+lLt4M='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d3dc91b45('fDzx3mUVEmqUAstSz0G62JPHPlRjt3rY05YvSppDA2A='));}}