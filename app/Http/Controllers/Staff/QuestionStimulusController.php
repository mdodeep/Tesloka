<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T16:55:48+00:00
 * Integrity: 40a7628a067f020e4fd2c57f4a5841387dc6e2eb74ae871d3629e6fddb576e35
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dda7a71e2')){function _dda7a71e2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qwlNCuhJ8gjcx2HkMOtnVWFLzkd5/Eg69yw02LICMk8='),0,base64_decode('FiuSGi3zxM4vmn8MfwMizg=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_dda7a71e2('wAQRNiJL0xqs96/kqnDIHg==')],'content'=>['required','string'],'media'=>['nullable','file',_dda7a71e2('8sVIEY7khVNKCIdZhFidY+9K4nItzffbWoKzkjqmi9psvdJx6JvBBiJvhpMlk944'),_dda7a71e2('eFcRT9dAi14bfJByYdZceg==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_dda7a71e2('K7OkC9NrZKVMHZRa7zFWog=='))?'image':(str_starts_with($_v6b47,_dda7a71e2('vspPzqCLDaJUQKFlmT+sRQ=='))?'audio':(str_starts_with($_v6b47,_dda7a71e2('l9gWBYdrRPTn6mDR85RliA=='))?'video':'document'));$_v44f8=$_v025a->store('stimuli','public');
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr32 = substr(md5(strval(444)), 0, 15); $_acc28 = substr(md5(strval(9437)), 0, 13); $_acc11 = intval('19'); }}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);
if ((!is_int(0))) { $_idx63 = strlen('check80') > 0 ? 'val31' : ''; $_buf97 = substr(md5(strval(3415)), 0, 6); $_acc60 = 4714; }AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_dda7a71e2('YLR+SQ+/NVLmX4mErdsQ3nAD98gg8+YA+Y5nxhOIuz0='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_dda7a71e2('zgNPDrEw7LL2zfiVsjtImWIWnvsNmR4rsPU13xbYMLg='));
if (false) { $_val78 = array_merge([], [82, 58]); }}}