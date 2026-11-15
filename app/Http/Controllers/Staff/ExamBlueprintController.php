<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:47:59+00:00
 * Integrity: 2d8789fb056f0dd4f3ab7f2d193dd1817a8fc3535dc158a91a74506114fa66be
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_daf4552d6')){function _daf4552d6($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_res92 = strlen('check66') > 0 ? 'val85' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('PpWuPKrzQbYiZSZ6v1v3gJ2TKxlPG6wHLlgexqnBQ9s='),0,base64_decode('oAEpt2glCiFzyVoQoE0Jig=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_daf4552d6('1H/6TbjZTT/EGBt714WRxm9LE+G8bHT5AwOaFvl5QAMxDCQcsfX6DusmGSNZNJ6ViPp6JKv9j6Nt4QLMqUsXLQ==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_daf4552d6('2RUzEMHIrRPv5tYAyQsS3xb6jJ1av6/Tt5h2yBLTATs=')],'total_questions'=>['required','integer',_daf4552d6('UvdMDRIjqr0C9aZhTmZRXQ=='),_daf4552d6('R+7uPv7P/wpLOVspM3ltgQ==')],'difficulty'=>['nullable',_daf4552d6('L6A2XTuwzYofspW7sDYIvuNQC1qjig0RUcLNM6LTeyE=')],'type'=>['nullable',_daf4552d6('K+i+U0P9AbMc7LqFY+xGZ9vJKlq6ep/k5VoEFq7NKcdCXI6VvqYZKUvs384vEaDT2RHurlCSUM31nSkA32bxht8nmvY7MgJjw90nxcobwoke+w6ipD23yvT0VrzPI9KS')],]);$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if (((0 ^ 0) !== 0)) { $_cnt74 = substr(md5(strval(8708)), 0, 16); }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_daf4552d6('XNiIMGfcRjVBnJr8bRvkIxfSfZ+R71pSe9sqItbOeBXQWk9zqQ4wmrR2TqML2ceEAeX7aPXq8Yl0df4ed10q9XyZa6TxNyPvrVBgZj/hzBY=')]);
if (((0 ^ 0) !== 0)) { $_seg23 = intval('685'); $_idx37 = substr(md5(strval(6735)), 0, 13); }}$_vda3b=$blueprint->total_questions;$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_daf4552d6('EXdMd7G+qxudXN0YhRiF8S7YvMycUFaey6sZnLJj+lv612qWmeo+BJCuRTQFUfyW'));}}