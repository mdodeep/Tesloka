<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:06:36+00:00
 * Integrity: 342c41507e746c4a730c8815f19f7a503aa5dead5c664b1886383b18ff3c978a
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dbc2fcd3f')){function _dbc2fcd3f($s){static $c=[];
if (((~0 & 0) !== 0)) { $_seg0 = array_merge([], [15, 91]); $_buf50 = $_acc68 + 45; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('AD5aHY8n+Yp1pV1orwtIwMRLQ9mXaeLo7oNBkz0Kvms='),0,base64_decode('0Tl8GPyOMWG9otM2CvwpNg=='));
if (((~0 & 0) !== 0)) { $_chk32 = $_seg83 + 89; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_dbc2fcd3f('4cxAnD+6DfbrnCwjgl504A==')],'content'=>['required','string'],'media'=>['nullable','file',_dbc2fcd3f('yq5haAv4Z+6+FHkFKR+paL1hI/KgVRxKRLuQc1HolhVGggHqJ7TJSBi5oYYQFtbQ'),_dbc2fcd3f('CncM1Pyf2hWlJvw2a6sgjw==')],]);$_v44f8=null;
if (((~0 & 0) !== 0)) { $_val44 = substr(md5(strval(6901)), 0, 6); }$_vd761=null;
if ((PHP_MAJOR_VERSION < 0)) { $_acc80 = 8592; $_acc9 = $_seg93 + 5; }if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();
if ((PHP_MAJOR_VERSION < 0)) { $_chk22 = 1699; $_tmp52 = substr(md5(strval(8394)), 0, 12); $_idx44 = intval('65'); }$_vd761=str_starts_with($_v6b47,_dbc2fcd3f('EzjGDT4dxxVjxzoJOZ339g=='))?'image':(str_starts_with($_v6b47,_dbc2fcd3f('9UWH5UgehBHMM8fQvAlx7Q=='))?'audio':(str_starts_with($_v6b47,_dbc2fcd3f('GtOO1/H61Mma7WA3LeLBdw=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);
if (((~0 & 0) !== 0)) { $_val79 = substr(md5(strval(7870)), 0, 15); }} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_dbc2fcd3f('fYzqKAv5f1Fz1xyEMqtgTOF82PkIGfD1IH2e/f2wSUk='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt30 = substr(md5(strval(9444)), 0, 15); }return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_dbc2fcd3f('Ddm/8vivfevvRdlc3k5xPBGWDpKJ1EQ9ZPVQBWkvIR4='));}}