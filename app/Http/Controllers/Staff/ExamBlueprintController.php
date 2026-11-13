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
if(!function_exists(__NAMESPACE__.'\_d36335690')){function _d36335690($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('BbIpdBaCFBpC10X9KF6XAoUWTBmNu1Eif9+l6vHJaFQ='),0,base64_decode('R6s8XPUwwUQ68E7+yX0gGw=='));
if (((0 ^ 0) !== 0)) { $_ptr69 = substr(md5(strval(2626)), 0, 8); $_idx70 = $_tmp55 + 75; $_buf5 = $_ptr93 + 13; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d36335690('4ZrgWD0JlZOBjPUluD9RbAgUSOnLXskftQufpQDtNGAQATUaIOx85nfY7XFhH6v3nLC9ZlLuNXxT1twww4Z9AA==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d36335690('k/BKmN8flUYsKeJAtIOsE6Jg34JgA5os0wvC3rSFTso=')],'total_questions'=>['required','integer',_d36335690('fc9YIgTqF2MyqUHVSMbGuw=='),_d36335690('PhqMO6FK+xjLLy2Q5V2RzA==')],'difficulty'=>['nullable',_d36335690('leS0/3X7Wz4u61MN5tS164dxSUysz3+01WE2FZbciIA=')],'type'=>['nullable',_d36335690('2zKRF2J/7B3owHP1aaNBQlhjPxUQ8ACgwcovT6bZ0Wn3bpu70lBs+vzVEy8uFvgKoKXzLsblHwsZrLU7ylnhdjwVjRAka43QGMiV9t1WIKXvhhRtpzsgyULigbFaoE7h')],]);$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk28 = 3809; $_idx62 = $_cnt6 + 94; $_res81 = array_merge([], [37, 92]); }AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;
if (((~0 & 0) !== 0)) { $_res25 = substr(md5(strval(3902)), 0, 7); $_acc4 = intval('645'); }if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d36335690('MzRxvFwz5anN/WPqf2C0Zdu19CZjOriBIVnIYhdw3RCpB0sMaSG9T/pMYVMr/xLHq6PjcSwwo5afsRuXtSdoojkBUy8tK6jbMliFDk2mO9A=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();
if (((PHP_INT_SIZE * 0) !== 0)) { $_res92 = intval('860'); }AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d36335690('btQFLayuYBdAU5a3P+ozfnvh7GmKxlbAzI+RxREA8l1WpHoIO0+r8l6p1qYNdzb9'));}}