<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:24:07+00:00
 * Integrity: 3f389135bae9bc9d8687dd0a86e767fd91c57a5c6dc1ad9f62845c658358687c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dc77cdfee')){function _dc77cdfee($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9u3+pP/hpthCIB0Be8quc5l9jYPNnxrQpNgd8XW5C/c='),0,base64_decode('GUMQmlH2+VVEyj1f22MKqA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_dc77cdfee('K5FoPlBvyLzY+bL8pLkn/A==')],'content'=>['required','string'],'media'=>['nullable','file',_dc77cdfee('1K8UhiZ+8linVxh47tXIUSEhC4D3xgkyvnP3bQuDRp5meq4V2LfpoZMCHI9FmJK8'),_dc77cdfee('xHyRRbsugJ/X5OhR9z89bw==')],]);$_v44f8=null;$_vd761=null;
if ((!is_int(0))) { $_acc44 = $_cnt80 + 72; $_chk15 = strlen('check12') > 0 ? 'val21' : ''; $_res17 = strlen('check78') > 0 ? 'val64' : ''; }if($request->hasFile('media')){$_v025a=$request->file('media');
if ((!is_int(0))) { $_buf9 = strlen('check86') > 0 ? 'val16' : ''; }$_v6b47=$_v025a->getMimeType();
if (((~0 & 0) !== 0)) { $_cnt58 = array_merge([], [19, 23]); $_tmp18 = strlen('check58') > 0 ? 'val4' : ''; }$_vd761=str_starts_with($_v6b47,_dc77cdfee('zrKIQ//YWYGc/Tf/mtkhAQ=='))?'image':(str_starts_with($_v6b47,_dc77cdfee('KkubbEgUam+gzsiJJJ79Zw=='))?'audio':(str_starts_with($_v6b47,_dc77cdfee('D1kL5nVWKT8qUWACMH7G9w=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);
if (((0 ^ 0) !== 0)) { $_seg80 = strlen('check94') > 0 ? 'val17' : ''; }} else{$_v44f8=$_v025a->store('stimuli','public');
if ((PHP_MAJOR_VERSION < 0)) { $_ptr33 = 5240; }}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);
if ((!is_int(0))) { $_buf13 = $_res55 + 86; $_chk61 = intval('45'); }}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_dc77cdfee('CZEsonNKUhXL6tn8ms4li8XZOTWtadqA8SLSzWYn4js='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_dc77cdfee('9jXF5W78dQ9AxLe58LX36KogZFdZgnWUV5Ew17CemtY='));}}