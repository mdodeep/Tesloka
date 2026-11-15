<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:28:09+00:00
 * Integrity: cece1f09a4c104ca687cd4df334946077335ee48ea708f4c43c98fb7ad43a1fa
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_de353478f')){function _de353478f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kdlQAH5KFm9kO9VFsZJBYxRVa8vUUPzl0D3Q5NTMCrY='),0,base64_decode('8/FgMNCavFQialePjHcnWQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_de353478f('CW8LL+9CHeyBVVD+BkV/7w==')],'content'=>['required','string'],'media'=>['nullable','file',_de353478f('mTYh+yqVFJm0fV6nYdir1eWQqAFKkm360LvEadtAZh7bX5ECfR2zQIExtWegtuof'),_de353478f('aIUCjuqLjGjJ2Qwvp7vOJQ==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');
if ((PHP_MAJOR_VERSION < 0)) { $_idx3 = substr(md5(strval(8089)), 0, 5); }$_v6b47=$_v025a->getMimeType();
if ((!is_int(0))) { $_acc28 = 541; $_res40 = intval('91'); }$_vd761=str_starts_with($_v6b47,_de353478f('L4c4eZ+OIZvOYQMj62DmJA=='))?'image':(str_starts_with($_v6b47,_de353478f('fZgQdlf/L88MztdRu2nKbQ=='))?'audio':(str_starts_with($_v6b47,_de353478f('DuINMYYvE3rZcm78gtytOg=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp27 = strlen('check38') > 0 ? 'val87' : ''; }AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_de353478f('zd5kV+W9Hr0t3HycUSjtQFTvzxvGxDLdAqeiJ0FzuX0='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_de353478f('wgTw4Ur36ryWpcAtdw3tbstoJBJkPhqd9QWsbsdrW6Q='));
if (((~0 & 0) !== 0)) { $_acc9 = $_idx42 + 86; $_cnt98 = $_chk52 + 71; }}}