<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:50:06+00:00
 * Integrity: 6fee3fd511e40e63d81a3969f04fe7438d544c4954970045fffff7363671dd5e
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d51186470')){function _d51186470($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VR4GJhM+ZgmG/bxGc+3dK+VrOE7li0bPyoMKZb0jSYc='),0,base64_decode('HX04MbwFMgMFpc216+4atg=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d51186470('5tIKLK14sF/DhVj2lFJRBQ==')],'content'=>['required','string'],'media'=>['nullable','file',_d51186470('5O649RlZvp/0/V2js1w8ErbwihasUejljZjvi+66r7PQirTKZnKV4Yok2vXp0Tqz'),_d51186470('KruXTIPUIfFTaOLn93xw8Q==')],]);$_v44f8=null;
if (((0 ^ 0) !== 0)) { $_seg64 = 8229; }$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');
if (((~0 & 0) !== 0)) { $_res10 = $_chk76 + 73; $_seg41 = array_merge([], [82, 43]); }$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_d51186470('COBvLSEjHJiAh+5WaJ9JGQ=='))?'image':(str_starts_with($_v6b47,_d51186470('jNmcHXW06Lrk0GdYPF1ZRg=='))?'audio':(str_starts_with($_v6b47,_d51186470('+ga8ICVioV65SXwS2QekSg=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(\App\Services\ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_d51186470('ctFFWJsj/onQ8ZCSgE5ruPL+GTEz/D/WbvI7x0yjUQw='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d51186470('J1pJXmfM14BOu0dkowTF6qSyp3LuxBdacdq/WGkyWR0='));}}