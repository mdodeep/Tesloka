<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:05:25+00:00
 * Integrity: 6bf75b5f50a067a401c4a59875f80ad2c41b597675022667189ae77fbdbcf9e0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d01e4b09a')){function _d01e4b09a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('T/hnvodTHuvbsowSsTyU+KxXBm5bOYElEajkorDhfyo='),0,base64_decode('RWU5tHQsuGeBRbeKD9g2fA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d01e4b09a('PuFM82lSy9/LAKnP9DSkLw==')],'content'=>['required','string'],'media'=>['nullable','file',_d01e4b09a('y7dahYFfGdwv9V6aHXYfN5vjlBNzOaAX+SKX8DcUlde8+8V1s844/j4Ez0qlxota'),_d01e4b09a('a7wlxmCvEUhbddC5VmQhng==')],]);
if (((~0 & 0) !== 0)) { $_seg74 = $_chk49 + 49; $_idx62 = array_merge([], [99, 40]); $_acc51 = $_res50 + 94; }$_v44f8=null;
if ((PHP_MAJOR_VERSION < 0)) { $_cnt41 = substr(md5(strval(2170)), 0, 5); $_tmp29 = intval('581'); $_idx64 = strlen('check0') > 0 ? 'val43' : ''; }$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx93 = substr(md5(strval(9474)), 0, 15); }$_vd761=str_starts_with($_v6b47,_d01e4b09a('Yx+aHsNOICZk9fAHO+rxWg=='))?'image':(str_starts_with($_v6b47,_d01e4b09a('beLmkT+qrixtDRh02ZOfmQ=='))?'audio':(str_starts_with($_v6b47,_d01e4b09a('Ep5/RiK9c8zZ2e8We2aI6A=='))?'video':'document'));
if (false) { $_res68 = strlen('check11') > 0 ? 'val27' : ''; }if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');
if (((0 ^ 0) !== 0)) { $_cnt68 = strlen('check37') > 0 ? 'val13' : ''; $_chk37 = array_merge([], [80, 79]); $_ptr23 = substr(md5(strval(4130)), 0, 10); }}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);
if (false) { $_val0 = $_tmp93 + 48; $_chk63 = $_res17 + 99; }}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_d01e4b09a('ClprkrUSFnzOFVk56UQshGmt6/sRuk0/oMSeB731cmE='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d01e4b09a('SvDqiHczuuvdDaEt3PcdtjM5uDJQirlvYWNtLDTGXws='));
if (((~0 & 0) !== 0)) { $_buf89 = substr(md5(strval(5975)), 0, 13); }}}