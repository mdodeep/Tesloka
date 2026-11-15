<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:28:09+00:00
 * Integrity: cece1f09a4c104ca687cd4df334946077335ee48ea708f4c43c98fb7ad43a1fa
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d9279b59a')){function _d9279b59a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1UnpJkbdpxqwFHuck3FdTVWZnTFuqXWZXMNYu+geLAw='),0,base64_decode('kjmI8+Jfjkfd3j8xlxzQaQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d9279b59a('pIW2Fa0nY6fCx09MTKPJBNfEnJU2dbJrGQZY8qnOlIE+YbRUB+C1ohNEG8s6IEkzwKTMwymOl2RPCZg5KRbbbQ==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d9279b59a('M10lfD8tCAvj/1AnQZ/MHLvYA6PNgLMd1kxz+rkg3ZI=')],'total_questions'=>['required','integer',_d9279b59a('P6PTl1JqEcSqnYrpyIGBgA=='),_d9279b59a('kuPJLahSgXDXnkjc6uU//g==')],'difficulty'=>['nullable',_d9279b59a('qMOdyTJaoBTBlus4Xu1210pz2WwaPktR5t/8EU0oUrc=')],'type'=>['nullable',_d9279b59a('vWK/BlGo4YrLRW/IJv5/wdXJobTsECnq5fJmrTcI4mpqnLfoufsqjskYzhfuxfVnSRW3xqZwl3fA1l+iihhMLcN6IawXq3aRajZ3D6vNLKRRUa6dQMaXDR5q5Aa7VlKi')],]);$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];
if (false) { $_acc38 = $_cnt76 + 79; }}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if ((!is_int(0))) { $_cnt89 = array_merge([], [11, 41]); }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d9279b59a('hOeOIn/Jb5bPOxg+x0T3xfhaYDceabsJcsn+9KwHQdjMZ30ICmNSXI4Ecs9HDa5dx5VjgzANaDfPuwLO4owFN/qtJWOm/ej9/hwRUam/ATc=')]);
if (false) { $_chk77 = intval('98'); $_ptr44 = strlen('check77') > 0 ? 'val40' : ''; $_seg4 = array_merge([], [77, 24]); }}$_vda3b=$blueprint->total_questions;$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d9279b59a('3P484ze3elvOS1t/afV3dzdIU8zNDI6VY10kQYyaqj/7iW9z4UQ/UcRL72qej+Kd'));}}