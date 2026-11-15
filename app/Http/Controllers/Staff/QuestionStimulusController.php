<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:46:00+00:00
 * Integrity: 48f468b9c8a9e8e6ed3ace6c1f4ac494a45f3d31c5c438ff237bc99f719e765d
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d9f9a95c2')){function _d9f9a95c2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HQ7MW9RpSkeGJ0bm9ExoWwiO4FA69NUGEPNHX3MJgpk='),0,base64_decode('y3Ln+XGO6SEv3ksY8UBmIg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_seg6 = 9601; $_ptr64 = substr(md5(strval(1518)), 0, 16); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d9f9a95c2('Fvp6I7F3KK9sXeQX5au/5Q==')],'content'=>['required','string'],'media'=>['nullable','file',_d9f9a95c2('g+c6DjsLo4GrC2OpSv4OQ/7/OD+zR9jL0UgeppdCeKbOc6N3GgcZ0RW3W/xpCd7U'),_d9f9a95c2('1hD2B1yb3UIM3bbsuVVyzQ==')],]);$_v44f8=null;$_vd761=null;
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk49 = strlen('check48') > 0 ? 'val26' : ''; $_acc46 = $_cnt16 + 86; $_ptr24 = intval('845'); }if($request->hasFile('media')){$_v025a=$request->file('media');
if ((PHP_MAJOR_VERSION < 0)) { $_idx64 = array_merge([], [96, 86]); $_seg16 = array_merge([], [87, 58]); }$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_d9f9a95c2('AVxpYRgxyHAJA0KJ88MImw=='))?'image':(str_starts_with($_v6b47,_d9f9a95c2('Exr1zRfjKa2dso7qTiUkaA=='))?'audio':(str_starts_with($_v6b47,_d9f9a95c2('bCj7a3+X95tbK/BuDjYciA=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');
if (((0 ^ 0) !== 0)) { $_ptr41 = 6410; }}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;
if (((PHP_INT_SIZE * 0) !== 0)) { $_res50 = intval('585'); $_res36 = substr(md5(strval(2559)), 0, 8); $_seg62 = strlen('check29') > 0 ? 'val65' : ''; }if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);
if (false) { $_tmp72 = strlen('check89') > 0 ? 'val54' : ''; $_cnt5 = array_merge([], [63, 43]); $_tmp14 = strlen('check28') > 0 ? 'val83' : ''; }}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_d9f9a95c2('monF8pAGm5Dk//Ta4FedOpylL0gA1j265tdS3rEr5/M='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d9f9a95c2('BIpKbKtTYTTEeQ72J2qVhMd+kUJ3+DXbMt4UovqgEdA='));}}