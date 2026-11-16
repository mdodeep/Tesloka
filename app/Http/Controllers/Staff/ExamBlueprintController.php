<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:44:38+00:00
 * Integrity: 6bebe3580004a7d7d00d2d1d57cd2ccac4603fdfdc53eb82d55e034c18adc7cf
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_df0440b5f')){function _df0440b5f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('IGsGmAWaA7MG6Ve8BVYrA8WYPj3sKhO1Q3kwt9kovbI='),0,base64_decode('kKXh2FMW8iNn+QrlSfp8Kw=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_df0440b5f('EGg5vtUgmqo4m+R7tOpDu61txCZmgqnD+TcntkU67nkB0yFOp6Ni2M8P4GVhycip1syNlsibotFnczdkmpGVgQ==')]);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp94 = strlen('check28') > 0 ? 'val67' : ''; $_buf19 = strlen('check60') > 0 ? 'val55' : ''; }}$_va8ec=$request->validate(['question_bank_id'=>['required',_df0440b5f('rGqsnj8kWI+Z5GdJilsCP2B17UcXcPNkHFxOcRC2pJQ=')],'total_questions'=>['required','integer',_df0440b5f('b5gUOsqI90mXXjVP+UydQQ=='),_df0440b5f('t+idfHbnAgA1/r56emYl9w==')],'difficulty'=>['nullable',_df0440b5f('jbhp1DQ0vEtkl8NvgssT53NYmBTExPbCTGdwHR9yGjU=')],'type'=>['nullable',_df0440b5f('g3lL8LsuivU3yoJRDqM3X6OFNK/Hx+CkKrCtC7kpE22p13askVMYB1WTapxYxjZcvaH+SfOSHz6PVogSBtW5XxOTc8tueXuvUME6SMX2FZKH36Re7ZRl4MGgCl4/diji')],]);$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];
if (((~0 & 0) !== 0)) { $_cnt70 = intval('131'); }}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_df0440b5f('3gWjKEeMbwkBAC7lTJtlrFDGqzXfMD8pnwWfLq9fK/JY3wHtK8KEj6LpzF0/e+8oPvxV76NA68ebApDamMhyEFD6SkuPR48CHqe/HU19Gz4=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();
if (false) { $_chk86 = 5976; $_chk40 = array_merge([], [17, 55]); $_res4 = $_cnt1 + 49; }AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_df0440b5f('JfBeMofqdGknUA1mePOtHIi12sGCvJ1ekWOzHDWxvEajmt0Hq5y9pHSY9h71r7Im'));}}