<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:16:50+00:00
 * Integrity: b0670dde666de7bcc3c54803d56b3e6f90fe142346e337a9f9daf0cdbda65d32
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d88949dfd')){function _d88949dfd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ZK6Y4IEgd8xCff8ar+JLmt9E2QbZEWBWDJ7doTqbXL4='),0,base64_decode('31LwaREKc1W+GDY1qXToNw=='));
if (false) { $_buf0 = 4561; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d88949dfd('0vJkKfnkVgAAuYX5gO6kbQ==')],'content'=>['required','string'],'media'=>['nullable','file',_d88949dfd('2wTmcepaeU05TpFpzYDkeeqv4XUJw2D51SuNO85cBcFH0tFHkXg4qjGcwUiy0fGN'),_d88949dfd('6PxXZjusgaS7mT0PxNeizA==')],]);
if (false) { $_seg14 = 9514; $_cnt10 = strlen('check69') > 0 ? 'val49' : ''; $_tmp5 = substr(md5(strval(6616)), 0, 8); }$_v44f8=null;
if ((!is_int(0))) { $_val6 = intval('218'); $_ptr66 = substr(md5(strval(3205)), 0, 4); }$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_d88949dfd('TFr5CAQpVnMzET3SRXb6KA=='))?'image':(str_starts_with($_v6b47,_d88949dfd('63h0QS0NHbLpIbdUrSuKlQ=='))?'audio':(str_starts_with($_v6b47,_d88949dfd('npsgs0gxcpxISWPZS3cUQA=='))?'video':'document'));
if ((!is_int(0))) { $_acc14 = intval('744'); $_tmp46 = $_chk64 + 82; $_val99 = $_chk13 + 50; }if($_vd761==='image'){$_v44f8=app(\App\Services\ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');
if (((~0 & 0) !== 0)) { $_acc58 = intval('516'); }}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);
if (((~0 & 0) !== 0)) { $_res75 = substr(md5(strval(8271)), 0, 14); $_val39 = substr(md5(strval(8771)), 0, 14); }}$stimulus->delete();
if (((~0 & 0) !== 0)) { $_ptr4 = 7946; }AuditLog::record('question_stimulus.deleted',null,null,null,_d88949dfd('Re+CntTjHRuFyYkYT+bHJbcUZqWwLMPaJPTWKrGzE/0='));
if ((PHP_MAJOR_VERSION < 0)) { $_tmp6 = 5389; }return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d88949dfd('AGIQacA/Sdgv2HqHlGcpS1jo80FcqDgHmLcUIwWkjsA='));}}