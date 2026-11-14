<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T00:14:21+00:00
 * Integrity: 3fd570dbe9cd7f257993cee389d5cf6c64d7903301710f7337e6fc54487ddb13
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d2bb36678')){function _d2bb36678($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_chk13 = 6936; $_val81 = 3793; $_seg80 = intval('706'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Zhdqrt+IhkQtVvfGZZ6R4Y7mMxx6L8EbJ8iuf8uSZBM='),0,base64_decode('7duUY4TKyZKbQOWxQ6xcgg=='));
if (false) { $_chk97 = $_cnt89 + 51; $_tmp38 = array_merge([], [22, 71]); $_buf56 = array_merge([], [73, 99]); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d2bb36678('iKd0Qtcj9hXlh89uwJfeGw==')],'content'=>['required','string'],'media'=>['nullable','file',_d2bb36678('y0IyQoB4neVRo4WBSZ+SokkluDkNsbe53ASv2cLj+m7YIsNlq7s8thkxegYtFcQe'),_d2bb36678('sB1MA9/ya5nUUgEaRvoi5w==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');
if ((!is_int(0))) { $_cnt14 = $_seg33 + 63; $_cnt98 = $_seg66 + 52; $_ptr25 = array_merge([], [33, 85]); }$_v6b47=$_v025a->getMimeType();
if (((0 ^ 0) !== 0)) { $_val3 = 8125; $_buf40 = $_idx35 + 7; }$_vd761=str_starts_with($_v6b47,_d2bb36678('C4oTAC+Sz2GB2fwnL0kwJw=='))?'image':(str_starts_with($_v6b47,_d2bb36678('q6vYVGL7lduhbA7YtDmiYA=='))?'audio':(str_starts_with($_v6b47,_d2bb36678('GckIDTh1jsD4ggT4JRH62g=='))?'video':'document'));$_v44f8=$_v025a->store('stimuli','public');}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_d2bb36678('Ed6UNVsow2jim/zMTIJBzQ8QfFq4TcL7Pr/n+fsd5HA='));
if (false) { $_res63 = array_merge([], [11, 56]); $_buf68 = intval('221'); $_chk51 = strlen('check85') > 0 ? 'val95' : ''; }return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d2bb36678('RN4jbeZS75+WMG3RjMLWTbcC7pHb45CHwOXwWEXDTQE='));}}