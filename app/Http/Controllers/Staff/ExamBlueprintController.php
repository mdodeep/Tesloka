<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T01:23:54+00:00
 * Integrity: c9df82339b784dd728a3168f634cd262da95f5dc86815611a3f634b5243e5e7d
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d29fd29ac')){function _d29fd29ac($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_idx14 = substr(md5(strval(213)), 0, 12); $_cnt99 = strlen('check7') > 0 ? 'val56' : ''; $_val98 = substr(md5(strval(983)), 0, 13); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('FnrkiuzmAzS8vG918l8klS6e8veOWdnvl0X1urIS0e0='),0,base64_decode('AKY1dkggeCJgp8Y6y6zv6A=='));
if ((!is_int(0))) { $_acc87 = substr(md5(strval(6929)), 0, 6); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d29fd29ac('SQ7S2FAn3MIAl7ndxUL0C6QjOqRNtH1VCr6qwCW7j3CW1vIFamZv733Eo25vPRkdlpGcyMKlPUYTPV9tbbEXDw==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d29fd29ac('R5WZCFUr5ojrSN8jhPCwqeURSUHZs6fWsuM3xXGDHIk=')],'total_questions'=>['required','integer',_d29fd29ac('JAW+Dx1oLEVebODFX0TvLA=='),_d29fd29ac('XvMGiOWqk/iv6TTwChnM/w==')],'difficulty'=>['nullable',_d29fd29ac('fIwRNw5s6lpACcOSja78P1ApA5B7GILet58AblX7peM=')],'type'=>['nullable',_d29fd29ac('bvgY68Y3OM556sqAakG9WyoOjdXqtY8b6w2wDpmTYWeUsVex/XZ6pxqRxRxEaI5eDBPSQ3+tdEFxbpd5bu8KYQkhft7FF5L8MtqybBdjS5kE2bSy6r5IuZzwHx+SzGof')],]);
if (((~0 & 0) !== 0)) { $_acc32 = intval('478'); $_ptr59 = strlen('check74') > 0 ? 'val28' : ''; }$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if ((PHP_MAJOR_VERSION < 0)) { $_seg80 = substr(md5(strval(8391)), 0, 11); $_tmp0 = strlen('check64') > 0 ? 'val77' : ''; $_cnt63 = array_merge([], [26, 67]); }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d29fd29ac('tS5voUduzD3giVYYvJM13KelVae64du9cv1dJc3Sx5woUuSGTaQr1bzynHe1a33NYxtu4GWKzgo2KaaZY4cRMrllOsgDZD17Q62g1t1z13A=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d29fd29ac('zb3qBKpdGbObMDEYNU5+TEwM3lsKZ8R1jIMCsfHHLvzp3JUZohMal+anx0QA/tLQ'));}}