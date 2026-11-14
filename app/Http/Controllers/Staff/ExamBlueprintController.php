<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:39:28+00:00
 * Integrity: 6a8d7cee511dafadb162bbc7b57792dbf936ef3d7540e180cb5c13f51e9b532e
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d3cbc408e')){function _d3cbc408e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HMWuUTSh5UzGjNhNSSXn+9Xjev5EdqavJdooceYztGo='),0,base64_decode('ps1h8si0l4euc/0uGQY0fQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d3cbc408e('Zkxu4H5MIl9sFjDoo4YLw+ybuILYJpU23bRDLcPGyAeZPW8MlOeK3z3A6B5CvUBVIC3FvwPRKFuwkPh/F5emDw==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d3cbc408e('qZUZM18unjkeGNISpkuB/CpCUKEGDV/Mg7rFHYoe5FA=')],'total_questions'=>['required','integer',_d3cbc408e('O/ssBQJtgc4tMXGLe4boAw=='),_d3cbc408e('zEdi8CC0c7HVEg0/gUswcQ==')],'difficulty'=>['nullable',_d3cbc408e('UgZbj3uJS/6QW0oxwPL0ZTfWeRQHwuRWIv4D85fPtBs=')],'type'=>['nullable',_d3cbc408e('UvcI3XG7YmQflw49wk5VV7Mw/j73wQ0qk9M64kHqUGbYw53tJkKb+LeSWjCt/gPm7J6aMYJUi8BIIjC8MdViM7ORljOz3H64YsKaZclGs6tOXWPw4FntvkwClhRolJ05')],]);$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d3cbc408e('xBPQuRqseEcWbFC6i1R7pPBJsN2NAguQmbHrI/5ap5hfuMFnis2if99ogzouI83wLB425FX4rImMaembVFknPsoPdnjht9sKDpfOuSPbZs4=')]);
if (false) { $_res91 = intval('151'); }}$_vda3b=$blueprint->total_questions;
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx37 = intval('836'); $_idx81 = substr(md5(strval(6194)), 0, 6); $_idx67 = strlen('check29') > 0 ? 'val79' : ''; }$blueprint->delete();
if ((!is_int(0))) { $_seg56 = 4179; $_buf71 = intval('125'); $_val14 = array_merge([], [64, 56]); }AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d3cbc408e('WNLKAgrGQvWwV57XPs3jY1qLZo7shavSMoTg/DLcYWG6wAA/HMn84S3wRvXrPWgH'));}}