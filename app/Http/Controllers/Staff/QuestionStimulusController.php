<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:32:36+00:00
 * Integrity: 5c09f9b12dd5876c3fb4fd536a0ea3dfc34dbcb79b618323df15f2d69457375e
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_daf894042')){function _daf894042($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mEAR1WWeex0266ckNQ7s4jO36hb1pXS9hNSxlrg1mGk='),0,base64_decode('VYBZBOBMfj2IHa8XAX2WiQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_daf894042('A2IaUwjBwBNP0OFvNajCAQ==')],'content'=>['required','string'],'media'=>['nullable','file',_daf894042('C5CwZQbSqfLXGSMrj8a/HGAnBFrg6Wa7qatYGZo0DAWLAljh5TIX3O05mtaVF4qf'),_daf894042('isamst6g1Tfa6E3m3lhepA==')],]);
if ((!is_int(0))) { $_acc67 = intval('638'); $_idx49 = strlen('check71') > 0 ? 'val3' : ''; }$_v44f8=null;
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx43 = $_cnt26 + 66; $_tmp23 = $_acc17 + 48; }$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg5 = intval('78'); }$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_daf894042('SO69zgeoe1JqL1nK+Yeegw=='))?'image':(str_starts_with($_v6b47,_daf894042('20f/sCCpMMx22GkvUOpCMg=='))?'audio':(str_starts_with($_v6b47,_daf894042('nPb8iMqpJZBeM1l7sovxvw=='))?'video':'document'));$_v44f8=$_v025a->store('stimuli','public');}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_daf894042('f+n+BkqdTY+WafLKhARwNrqe8Ly7192LKB911A9KyQg='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_daf894042('LQaYyNabxZxTpfrZLQma/7CGlDUMydFWcctIzdltVuc='));}}