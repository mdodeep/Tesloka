<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:33:36+00:00
 * Integrity: 074f9f57e386c0fb439ea72e8b3c050b81e2c948c6e3c0349aba811f6b60ed9b
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d1a12e531')){function _d1a12e531($s){static $c=[];
if (((~0 & 0) !== 0)) { $_val35 = $_chk20 + 30; $_val99 = $_chk20 + 4; $_cnt65 = strlen('check6') > 0 ? 'val62' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LNBwH2W7IhOUYSdZuQlwUuapTGPlCj+6uWj6XRDFgtQ='),0,base64_decode('UlbNZlTDH1xLPv6s/h6r2g=='));
if (false) { $_chk84 = intval('733'); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d1a12e531('YMRRxz1Sh9+Zw9Xih3VNgQ==')],'content'=>['required','string'],'media'=>['nullable','file',_d1a12e531('vHGzI4EdD8Pni2jDb8u4EfxNDmZSIYeTVy/hAf+6MEadLvQ1J9lnRPm5uC2Idkuw'),_d1a12e531('XLhn15LlqV5NxWmrffPNJA==')],]);$_v44f8=null;$_vd761=null;
if (((PHP_INT_SIZE * 0) !== 0)) { $_val76 = strlen('check4') > 0 ? 'val96' : ''; $_idx0 = $_val39 + 10; }if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_d1a12e531('KzxzD1/g6W9E/hm8sumzeA=='))?'image':(str_starts_with($_v6b47,_d1a12e531('tqThRHDOduScAFCqUCmLbA=='))?'audio':(str_starts_with($_v6b47,_d1a12e531('fs9KCr/k5igULn+xe+uVEg=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');
if ((!is_int(0))) { $_buf92 = intval('246'); $_tmp3 = intval('879'); }}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_d1a12e531('DLsCxoCXaMh29nbmhMeOc7irVtvjRCbv3lTBXUGi8c0='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d1a12e531('WOjKKW7okdlrZkegkcgTeslq11yam3XU2tHnaZK5hQ0='));}}