<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:39:42+00:00
 * Integrity: 53bc74327c18e765d74c6475f6b850465c9378654adb7b23448a7ac1e9cf25b0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da5cef002')){function _da5cef002($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_buf96 = substr(md5(strval(820)), 0, 4); $_res17 = intval('104'); $_res51 = substr(md5(strval(4612)), 0, 6); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('O088W4ZxEtiiVwBx+WRxdd4EIxC2zYxJl6kt2Zpmr9U='),0,base64_decode('6LAEZNWjx2qlZioNr2wcpw=='));
if ((!is_int(0))) { $_cnt61 = intval('433'); $_chk40 = substr(md5(strval(7452)), 0, 10); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_da5cef002('vJwrePfQ4AxkZEbn69rfW4q0gQSQNBmR5gYdJ0J2Sa6AVE8593Cpk2NWBJXOVRIIYaIPF8UazBcJEmFHbKzN7A==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_da5cef002('0tw3XnGAp4HVhB/lF4HrzjSU6KzkKDXZE2QOEqnuH6E=')],'total_questions'=>['required','integer',_da5cef002('Jcs2T8BOZ00hC4bNahoj+g=='),_da5cef002('+tZnL7V4Yn6Na6Hj4v13SA==')],'difficulty'=>['nullable',_da5cef002('HQard/QbqyWTC18PEC0yr42n/ySXIYar72kXVk5+wIw=')],'type'=>['nullable',_da5cef002('ZGce7FYQSeKicSoMELci4OU8w6zbxkSk43T0YbaOrFEdU11GOuJZo3ynEUuLlJm4Y0uJ5kLgzqZDRUZRKmjVi3Z9ih5km6qix4xUNdSTAdgt3B35ERdqhsoPLjtUgtok')],]);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr34 = array_merge([], [85, 69]); $_ptr97 = $_ptr52 + 28; }$rules=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr74 = strlen('check15') > 0 ? 'val17' : ''; $_res74 = array_merge([], [73, 79]); $_tmp3 = substr(md5(strval(8534)), 0, 7); }if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf78 = substr(md5(strval(8019)), 0, 14); $_idx61 = array_merge([], [57, 54]); }AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_da5cef002('XGNXB5nYcYdywRx14q5d+RScM43C+P5CXYkdN3aKstAjur1OpDSPgahe08tDpFb7GNzOzyi6hHQmM8UkpAcgPAp6AwqXQPNAL3fwZdADiAQ=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_da5cef002('ai3ca5U7nuOL6WJHNSwezvDX+INh9WNJjOmue+TaQZAhdsK80DA9Emg5IhrSKuNf'));}}