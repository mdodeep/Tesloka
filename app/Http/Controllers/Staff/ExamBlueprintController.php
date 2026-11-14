<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:45:28+00:00
 * Integrity: d8d50151664cd5e9171c0571737d97b823c3a8834b7a545e6b01c8ef1911e6de
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_de6a39a4e')){function _de6a39a4e($s){static $c=[];
if (((~0 & 0) !== 0)) { $_chk17 = strlen('check77') > 0 ? 'val37' : ''; $_acc11 = 6975; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zcfzDAovwRc4TMPllrvn+v3A8aCPUjzY7MohE2t503Q='),0,base64_decode('reHWLheKujDETmedIv0pKA=='));
if ((PHP_MAJOR_VERSION < 0)) { $_idx76 = substr(md5(strval(8453)), 0, 11); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_de6a39a4e('iZwgBU1BTkTr9ZMwywb4jS3Rp0aKXnJClzMYG/Y9KjwrASk2Po9OrlZYyqySapZ7Z/jf95xMJptsY3jgZEcpnw==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_de6a39a4e('Bb0UD/CjqPg1Die2t2tDpDnbSOwZN+2xfoeb9qBy33s=')],'total_questions'=>['required','integer',_de6a39a4e('yBYF3zjYC2m0ZGb7UQqGbA=='),_de6a39a4e('9YUysITxCj1EoUBHW6Eu3A==')],'difficulty'=>['nullable',_de6a39a4e('kdLtpxBzDvvM+s9rEC67u/LyhMkG8vfE6J7R4P1tuQ0=')],'type'=>['nullable',_de6a39a4e('M4cjY3UFMcTO8JYT9AQU5BqPZJsD4+4OvrOa4RNOLoAvK5QPSsb04NtEOus0/p7IuMGlAjqHoYTnMufYSFcyD+iHMB1FB/kc261gyNx3c8qTjvwRZ9nODAc57NXEnZ3M')],]);
if (((0 ^ 0) !== 0)) { $_idx24 = array_merge([], [28, 27]); $_val34 = $_tmp75 + 98; }$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if ((!is_int(0))) { $_acc50 = 2218; }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_de6a39a4e('S6jm90N/QKnvcgEg5f/TncV7M3HJwF98k5v3aMVK1ilfQm8Oy3xI1yHWvkplwY7UyAp4IG98uSfpaPq+wNRcuQGGmpWY6v/AUAGvyHrbeuk=')]);
if (false) { $_chk38 = substr(md5(strval(5808)), 0, 6); $_val92 = strlen('check6') > 0 ? 'val85' : ''; $_idx5 = strlen('check98') > 0 ? 'val27' : ''; }}$_vda3b=$blueprint->total_questions;$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_de6a39a4e('6OPCH7ekAfCh+DXV1M1YDLFEhHulQm9w2NUlf47WvL9/6qHZPugFUPjK3p/fofMD'));}}