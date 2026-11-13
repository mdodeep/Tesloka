<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T14:56:36+00:00
 * Integrity: 78cbca2821cc59d43a345628c4c2425a85bcc54fe4165cc6f43631d36dc923e0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d7c4d1495')){function _d7c4d1495($s){static $c=[];
if (((~0 & 0) !== 0)) { $_chk45 = substr(md5(strval(1831)), 0, 10); $_ptr27 = $_tmp23 + 8; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('URaRwtzQXpS3yD/rpm9M77yYdUB7kakx6EH8fmYocxE='),0,base64_decode('RfZn5bGMBmMXBver2v+vJQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d7c4d1495('SMxqjfrmwuiOxgwjaBZVAkwxUyocW/SRB207UGR6d0Gw4/OHqzQREuDFI8BDpQY41f42VI8DyejN6iqauvRlmQ==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d7c4d1495('Ib7l1Ta94339NI1mZZnAMYHwlUY0DJJM50sIoOPyJ+M=')],'total_questions'=>['required','integer',_d7c4d1495('pF8Cqf2A2uOqXjNuz9K8YQ=='),_d7c4d1495('pq9GmYytOkD3BX16SBK+SQ==')],'difficulty'=>['nullable',_d7c4d1495('Oep9DJave9rbRvh6NXQcyimLQgtGsnkZKogZJi8xf/I=')],'type'=>['nullable',_d7c4d1495('XcDSKF64qjI5suqVx0tbBDNMNt8jQfoDS53flwFaWHaDPtQaJfrzYSVha2HYmoSuKBRI7m3+zcAee+RmjF8bwYRz1LFgs6uYrCoF0PjxgcTJeKDZiKAiFxGUxRjwGzs1')],]);
if (false) { $_acc6 = substr(md5(strval(3309)), 0, 9); $_val9 = intval('950'); $_acc93 = strlen('check10') > 0 ? 'val71' : ''; }$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;
if (((0 ^ 0) !== 0)) { $_seg69 = array_merge([], [77, 80]); $_chk27 = intval('279'); $_tmp79 = substr(md5(strval(8678)), 0, 4); }if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d7c4d1495('gk43qHxKcVEUg5IamlwnOeVzKPU13r5nqtZq5qJ32kEDVmk0xqTGm2q4vA3ilXra5M+PpT3KVKNQ1bFUOoGP2r3HrLhvSFDe1/DevvNtvuU=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();
if ((PHP_MAJOR_VERSION < 0)) { $_chk95 = intval('602'); $_tmp47 = array_merge([], [87, 46]); }AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d7c4d1495('VLIItoAMldQb68V6lV0bnZftR+K5K8mYA/EGLB19bgqu5qJ3KxIvQ8JbwCvCIcfN'));}}