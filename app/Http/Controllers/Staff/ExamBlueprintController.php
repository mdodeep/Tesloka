<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:46:00+00:00
 * Integrity: 48f468b9c8a9e8e6ed3ace6c1f4ac494a45f3d31c5c438ff237bc99f719e765d
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dda28b107')){function _dda28b107($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('cmAELL35P0NPPWm39r/QutEm/K2bgCsC02figRgJtko='),0,base64_decode('F2j1bt6AbV2dZdvhNhNNvA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_dda28b107('gJ+vqdK3yyXyuTRO6nnNAjkWJweugFpESYWpkoQ4vWO0HFczkdhR7seqmyikJYoaidzDOzq7wwnnoJpNFY3fkw==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_dda28b107('VZxe3oAvVElO1KGJxfj3J6XtJDn2W1P9KhUkQyKK4HQ=')],'total_questions'=>['required','integer',_dda28b107('PlGkfRJ50FDAfe/YyQStsw=='),_dda28b107('zR1VuWzbZQ5MqWKtmm405g==')],'difficulty'=>['nullable',_dda28b107('a3GFGH4GPDjdDPa1SVY4R4LxzxxzrKVJYFYM0mhmSXQ=')],'type'=>['nullable',_dda28b107('R6yZZWAIqlEg0yRR2axbtDuTPzUWHkf6xbh7zF5zl43AV5auEAhcJ5wwXAFejUwEuDQ0rLW1s4mClLjtZUazT4AtcopoyZzNRIlB2Hdozy9K5TtuhhX8SsB4fcF7jtFC')],]);$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if (false) { $_ptr12 = strlen('check27') > 0 ? 'val34' : ''; $_res71 = 526; $_seg16 = array_merge([], [82, 72]); }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp93 = intval('897'); $_buf96 = intval('345'); }AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_dda28b107('dHU6D4Oob/dXElJMX874jWE9x9tfBzVMhJQ/Mr2tk0XEhO4GNqYJreZwlLW3MVB+XFcOGCVKGGvPYKRERbtdcSvYkWaaTejDLig3ZV5jvuc=')]);}$_vda3b=$blueprint->total_questions;
if (((~0 & 0) !== 0)) { $_tmp30 = substr(md5(strval(6131)), 0, 7); $_cnt83 = 8567; $_chk97 = array_merge([], [3, 44]); }$blueprint->delete();
if ((PHP_MAJOR_VERSION < 0)) { $_res10 = substr(md5(strval(3661)), 0, 15); $_res44 = $_chk96 + 65; }AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_dda28b107('fMI9ExotOYTUKfI8MHVl3K50kNoKTBCjDw7rkekBadBO0tJX6wuAvU4/EM0poutU'));}}