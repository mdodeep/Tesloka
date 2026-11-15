<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:38:34+00:00
 * Integrity: f5de456ce7b5a3ffff444b8d6e857cd97d6610ca1b6892c02107dfc3b0b527ec
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d7548a9a5')){function _d7548a9a5($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_res76 = intval('901'); $_buf17 = $_ptr16 + 64; $_tmp30 = array_merge([], [29, 10]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('cBMBhvSL8htZJsHXs1ATlU89fp67tCLZfBnEh6TnDAo='),0,base64_decode('7R47hEyW7NQdmKgbmtTV2w=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d7548a9a5('6toHYgQbqwmS/OYSCGCm2cyApt+Dpe2pFzoPUqqC6qRwFCstzfcoZ63l+lafffjqCh3iwJ/ENSzZapllWF8wvQ==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d7548a9a5('VptF3lx4ae93Zk6p+4kyUb0O5Fkc6V3yroI0/0CPaqY=')],'total_questions'=>['required','integer',_d7548a9a5('Z6d4jIeAzaXIQ1JkWo+gDQ=='),_d7548a9a5('L+N5jlocX8dYD6fMiTNd8w==')],'difficulty'=>['nullable',_d7548a9a5('Wntyqf9Q+A4UIAexEYnPz+2fb4BCPlppObfCynSBLcw=')],'type'=>['nullable',_d7548a9a5('y6uctHRI7k67NLg28LIiPEGtz1cqm+DQcBIpqQFNpRuqJFa2QIgQDTmi2zxyYwGWEqOG3f1A6qnCbfKMOnUV9KVuoyIJHqPb1BE//FnFXzo6gY4ClzrsNN+q6ttKCwss')],]);$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;
if ((PHP_MAJOR_VERSION < 0)) { $_chk75 = intval('121'); }if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d7548a9a5('nGkDzRUZpCGTfRypxyRlr+6ozeaOMT99kQ6gPlxve4ADzSIKmMSclxEh1fEJFnfVsMgElZE2qY/KUgFBY76hrEq2k0QdXdTbMI1UiA7WElc=')]);
if (((~0 & 0) !== 0)) { $_acc62 = intval('876'); $_idx44 = intval('887'); }}$_vda3b=$blueprint->total_questions;$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d7548a9a5('Bforz8GQv8Z0KzOMd/vNU7SkWxKRnf0k6RFBBNnX5p9VGpYdRuKiFto6fsuwtlDk'));}}