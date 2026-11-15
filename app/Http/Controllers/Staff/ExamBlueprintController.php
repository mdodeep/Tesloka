<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:18:25+00:00
 * Integrity: 30350d0d407133c60dc35f647df51f0d7b9b92c945b39e777451cd0a62c3a458
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d433455d4')){function _d433455d4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('fJh5OMnYq4RIYODb8vj7QHvo6oBj4NeUJQqNwdkBj3E='),0,base64_decode('LuPfv7r7rNUPHchQcjKPRA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d433455d4('mNK3P4vmEerARNVUt31hJPLCeCNxxuHLrJq5XeOWQdQVf4cXhUlUDlhklVlineEpOjMa9tKK7Mhys0LOOXSMQg==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d433455d4('KWC9kQB22UnwhXvroSArRHQ1B7/D4wtm6Xx+mTzySTM=')],'total_questions'=>['required','integer',_d433455d4('AozS8uicr0NSjczK1UxETQ=='),_d433455d4('K7o1zWL08TcOTfwlsM0ifQ==')],'difficulty'=>['nullable',_d433455d4('jV04e2i4uVkmPo1rrQiOJPbPzGdgLI80MzomnBEt504=')],'type'=>['nullable',_d433455d4('wVSCl6tOSBg/eCLg5+FvUdzDa3/IyKF1QFSQiPWb+APbwEPLbVod2cnBaTHF8umisJSGy0F6CvO9vbgYE7WUgWCep3ZpXyvRrDT+nA0b2Gxn/oo++ZLBS1lKYj45qgBL')],]);$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if (false) { $_seg10 = intval('632'); $_seg5 = strlen('check39') > 0 ? 'val77' : ''; }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr79 = substr(md5(strval(8790)), 0, 5); }AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d433455d4('Sho46owZtaVov6Y7rv7vMeP6M5mLRf2LnQIOLc+OpPLz1AOzb7zeFUB9VbS5M6ogVYHhSbBWLhZNgKEObz3IvLWiOidynR3Qwd0/w7TqENQ=')]);}$_vda3b=$blueprint->total_questions;
if ((!is_int(0))) { $_chk76 = 610; }$blueprint->delete();
if ((PHP_MAJOR_VERSION < 0)) { $_idx61 = $_val65 + 74; $_cnt42 = substr(md5(strval(7520)), 0, 13); $_ptr16 = 122; }AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d433455d4('l941RaIH3AvyXoPq9QwG376uskLDpxggrycWddXP0HHaicphhkTRCB1C1OhK9U1V'));}}