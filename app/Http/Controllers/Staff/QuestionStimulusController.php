<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T10:25:07+00:00
 * Integrity: ed995c81e28fa02e1a6f329ac1d5ad5603084540759db7883a3c60a32583f05c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da007ce0d')){function _da007ce0d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('52gG5XQpWjnx9+yyjix/aBOWADwCVoE2xQYXJ8Jm8qU='),0,base64_decode('b6TOOnFu/e/JraAPwV5kcQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_da007ce0d('4mgHioyAf7PKshMvSz6d2g==')],'content'=>['required','string'],'media'=>['nullable','file',_da007ce0d('6QZmVGcQHmy+NOXBZWhKJ2Fv9582GfEjgdl0PV3PYA+CRmrr04aS/epo6LaC557b'),_da007ce0d('6bdd6eyewQYxca8HC6xLDQ==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');$_v6b47=$_v025a->getMimeType();
if (((0 ^ 0) !== 0)) { $_ptr22 = array_merge([], [21, 23]); $_buf56 = array_merge([], [46, 19]); $_buf86 = 8540; }$_vd761=str_starts_with($_v6b47,_da007ce0d('sXIuAQ3OxGnu+U5Xh9mhFA=='))?'image':(str_starts_with($_v6b47,_da007ce0d('h5T1i14dAd0xsdHuhSpsMg=='))?'audio':(str_starts_with($_v6b47,_da007ce0d('9Iqzm6TuQdvWiH4s03ZgPg=='))?'video':'document'));$_v44f8=$_v025a->store('stimuli','public');
if ((PHP_MAJOR_VERSION < 0)) { $_buf51 = 8373; $_tmp79 = 6046; }}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;
if (((PHP_INT_SIZE * 0) !== 0)) { $_res1 = 701; $_ptr35 = strlen('check71') > 0 ? 'val81' : ''; $_tmp19 = substr(md5(strval(8048)), 0, 9); }if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);
if ((!is_int(0))) { $_cnt79 = strlen('check96') > 0 ? 'val61' : ''; }}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_da007ce0d('pxdYyzUVSWRjZtd122WlLd0M0QRV2KD2m9WvG1hi5vA='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_da007ce0d('bLf/HTBtMtn6dRq6XALKkKCALK0mzlqDEWH3j4wHSzM='));}}