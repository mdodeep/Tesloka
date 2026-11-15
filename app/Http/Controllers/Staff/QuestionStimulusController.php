<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T06:42:16+00:00
 * Integrity: bb3a7236b1656d72a48cccc9f91b27a2111a0ffedd0942e3d65667ac8cf7e53d
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d7eef4db7')){function _d7eef4db7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('n5oxkeDBsmXgSfPE04CKDGNpnrigi/zH7XGSSph4Yt4='),0,base64_decode('Bz5VKZjFzpQx0DKvSVtOWg=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d7eef4db7('a/d0qVnAp09O2tEnMlK2iA==')],'content'=>['required','string'],'media'=>['nullable','file',_d7eef4db7('LSl9hvovLTHMkJV5FvLVjIMfe+VnNFxiw5YWNTjTAxcyfcyeJC+pxsTQ5IWHo5Jp'),_d7eef4db7('8UFGxi6zgEX4PrrBdCSLag==')],]);
if (((~0 & 0) !== 0)) { $_tmp66 = $_ptr58 + 72; }$_v44f8=null;$_vd761=null;
if ((!is_int(0))) { $_val2 = $_idx29 + 95; $_tmp46 = strlen('check91') > 0 ? 'val32' : ''; $_seg18 = substr(md5(strval(5560)), 0, 11); }if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_d7eef4db7('Da/ePJLQBIyYsyBQFo98Kw=='))?'image':(str_starts_with($_v6b47,_d7eef4db7('YIe5wv1QijaF2b70iiMhSg=='))?'audio':(str_starts_with($_v6b47,_d7eef4db7('NpWmB/gMfhxjIxJYUmKk8g=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf61 = array_merge([], [16, 12]); $_chk54 = substr(md5(strval(9927)), 0, 9); }} else{$_v44f8=$_v025a->store('stimuli','public');
if ((PHP_MAJOR_VERSION < 0)) { $_val93 = $_acc56 + 55; }}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_d7eef4db7('VeoRouZDpT7I6X3FjGvD5wfpEbrMYsqc8hgDfeuiJwU='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d7eef4db7('s9lJ4V5zfMcAweYo1881ydk4UyMj4QwdedYPoyun8dc='));}}