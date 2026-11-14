<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:47:31+00:00
 * Integrity: 3849ab4825874ba3b4a694f789db49a2717d82dbfb50c0c7a56a0c623d677587
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d0fd9c911')){function _d0fd9c911($s){static $c=[];
if (((~0 & 0) !== 0)) { $_chk20 = intval('296'); $_tmp81 = strlen('check25') > 0 ? 'val2' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('29whDlCEzpUUhxug6cUXdn8M/a+sUWZzDKATmg/iSAE='),0,base64_decode('F8fi63RCr6JUnEXFUb56ug=='));
if ((PHP_MAJOR_VERSION < 0)) { $_seg90 = 8545; $_tmp35 = substr(md5(strval(74)), 0, 5); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d0fd9c911('gwRkZGrdA1wPmsfJl2ZzLg==')],'content'=>['required','string'],'media'=>['nullable','file',_d0fd9c911('QiUJBWA2y2Q2V7DY4/WUFh6sFFcSoov/cNEgq1Q5wuuqdw5KR8QBSeAMuwf8GAJR'),_d0fd9c911('4LBv6ncuEfOCyZn75Xp0JA==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');
if (((0 ^ 0) !== 0)) { $_buf88 = intval('531'); }$_v6b47=$_v025a->getMimeType();
if (false) { $_val78 = array_merge([], [95, 95]); $_seg17 = intval('749'); }$_vd761=str_starts_with($_v6b47,_d0fd9c911('s3FQHnFWcxvkNLRROaXOWg=='))?'image':(str_starts_with($_v6b47,_d0fd9c911('qYRfG4HJCPjnyh3tORuQ6A=='))?'audio':(str_starts_with($_v6b47,_d0fd9c911('tWMXNIpM8FFKu/0p6WwMLA=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);
if ((PHP_MAJOR_VERSION < 0)) { $_buf20 = intval('354'); $_res6 = array_merge([], [24, 59]); }}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_d0fd9c911('2W2kpeqi0I6YrC0KTdKd+wRArd9LyN94Uekcr1JXFFs='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d0fd9c911('nfE/NwsuD0BlN/eyYHIyG2BENUGBfJGjz8JODK7aDIE='));
if (false) { $_idx62 = intval('675'); }}}