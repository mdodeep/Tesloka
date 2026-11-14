<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:41:25+00:00
 * Integrity: 19ffcd183b06b290f70987e48bef3ef29e513242885f30f4020600e55a930319
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d7b588310')){function _d7b588310($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3p0k3vOPK2Mp59nDscPL76PDrsPKYOsqzT54lxSskFU='),0,base64_decode('+AOARrGVS22ENWT1MsAzqg=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d7b588310('4hBEklzv7olgQ2mtrtTeZZaAHu6btTA+TfFuJRqBEqhCbo0rx8MqinEUpA+JdK7AjGQAd5rD3aIdQ+0AdSMlIQ==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d7b588310('85H651WfXoaN8IO4HR9KknHnBXMFfpjOStx5+a7HG9k=')],'total_questions'=>['required','integer',_d7b588310('p1DQt99USLExaKF73Tre6Q=='),_d7b588310('feRWzX6MLc1LUVLOU55I9A==')],'difficulty'=>['nullable',_d7b588310('u1cqWtJmwU4epaKVsrqDc/51BNVvtkS0X/EHEny2C7I=')],'type'=>['nullable',_d7b588310('wCWRLiX2tfue8FurDa8rgfk+kybSrXfbsPHT93mtG7mHGxM3rAy79Qxf0aXn+nCbxZw5fIENVkWcyQlzCvb2xGcT4QS5L5wGZHzZL/fp1ScP0O0Hp6Rqtn1+RRKYEU/y')],]);$rules=[];
if ((PHP_MAJOR_VERSION < 0)) { $_cnt85 = array_merge([], [15, 39]); $_val47 = 4827; }if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];
if (((~0 & 0) !== 0)) { $_seg16 = array_merge([], [72, 21]); }}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;
if (false) { $_res64 = array_merge([], [1, 42]); $_acc13 = strlen('check61') > 0 ? 'val60' : ''; $_res31 = 1024; }if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d7b588310('ZMsPLVT0SmT0nnxphQHk9m64jt2gyBteh9EO50t15HkrDwd9M2Kp8a9H1dwsdI2I4bRiwyY3B/0DKmgoPmGbAuyCuEZJWLklIOpLRW3f4XE=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();
if (((0 ^ 0) !== 0)) { $_res42 = $_buf96 + 40; }AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d7b588310('+OIY0txLYqsS9iwd2CO2ddjcwp+NkAfxnAgXAYRW47cyCwwmBmFXZ3McDnv1Ai85'));}}