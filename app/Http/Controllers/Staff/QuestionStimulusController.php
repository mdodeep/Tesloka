<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:37:08+00:00
 * Integrity: 453f233f3fab52634ec2f18e0752b7d9c835945c007e1a04ea31d7efaf616c33
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d9374abbe')){function _d9374abbe($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4E+9cDLO169eY/0jkAnCOHCAXe/nSgu0nCLEEh2rmPs='),0,base64_decode('+QBcz3Px9RlqNKj4vg/ycA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_d9374abbe('fu8qktNVhYXJwegrxNbd2Q==')],'content'=>['required','string'],'media'=>['nullable','file',_d9374abbe('xecjtxAkLuvbskHH0ok6syp115y9WCBtnkTTcGvGsdvVg09WKIxIjRl3XO84QBfg'),_d9374abbe('iu6JJ28i5NUx1UkVnnUJWg==')],]);
if (false) { $_idx50 = intval('1'); $_acc23 = intval('522'); $_acc94 = array_merge([], [68, 42]); }$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');
if (((~0 & 0) !== 0)) { $_val91 = strlen('check8') > 0 ? 'val78' : ''; }$_v6b47=$_v025a->getMimeType();
if (((0 ^ 0) !== 0)) { $_tmp4 = 1119; $_idx9 = intval('808'); $_idx36 = 4934; }$_vd761=str_starts_with($_v6b47,_d9374abbe('IiDjK52iICRdC9zYUZI9hg=='))?'image':(str_starts_with($_v6b47,_d9374abbe('jZ5OVBhGjt9lMVZZBumPqA=='))?'audio':(str_starts_with($_v6b47,_d9374abbe('+MomDqTRXHIDQUBxjF0Arw=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');
if ((PHP_MAJOR_VERSION < 0)) { $_seg81 = substr(md5(strval(4947)), 0, 11); }}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);
if (((~0 & 0) !== 0)) { $_idx11 = intval('123'); }}$stimulus->delete();
if (((~0 & 0) !== 0)) { $_chk53 = substr(md5(strval(8637)), 0, 14); $_res45 = array_merge([], [60, 71]); }AuditLog::record('question_stimulus.deleted',null,null,null,_d9374abbe('q1ZWUWBbN3oxUzRr3DIcQUlJ/TZsrLygrAShqsIROTc='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_d9374abbe('136R1uR3tqw0qb4MOI6A0FE1Yay4uoO16ht2lTIqhSQ='));}}