<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:50:56+00:00
 * Integrity: 4072f5c2ed854a61a3d5cfbfee6bb8b9fecbf87bc540634ca6bab2ee1156cd57
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d7f2f2eac')){function _d7f2f2eac($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('DYR44dbLnSLmTgB+u9HkgEjbx5jDnCTS8kn9tm0bWh4='),0,base64_decode('bcBiayCbIUNBoRaZEa2Mlg=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d7f2f2eac('6/fZ+4YExM2OFXjlkxFHWzc7IOPFLaqvMAWO3bk/493/onYFs9o6JeQXheN3xnFRp2NgMzU8eDIXrC/a2E32KQ==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d7f2f2eac('xadGM4OOmYScLO5dDzQisD4XFntP77KugXdQUfcXJHc=')],'total_questions'=>['required','integer',_d7f2f2eac('hINRT5g7UeU08GoZXZmd4g=='),_d7f2f2eac('TR5RlYNfOcIBldj0q4/9qg==')],'difficulty'=>['nullable',_d7f2f2eac('Xex8K2Z4K3azl+/rCfgjDqZT/rGjlB4iv0sU9Xt3u4A=')],'type'=>['nullable',_d7f2f2eac('nuoVXEE18FXQmsvwDQXskI4DrPspe2gZeFN4F4R9NQi0bbUjUOtpAEj6HiQ0nKf7/GrCrZpwzmkbgBnxoZrxfuI4zo51eeM3GJIavnwzDUxhnrJPhJhhvxjJXwwcwztx')],]);
if ((PHP_MAJOR_VERSION < 0)) { $_chk72 = strlen('check65') > 0 ? 'val27' : ''; }$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];
if (((0 ^ 0) !== 0)) { $_val7 = strlen('check79') > 0 ? 'val49' : ''; $_buf94 = intval('907'); $_res26 = 4158; }}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if ((PHP_MAJOR_VERSION < 0)) { $_res68 = intval('350'); $_res83 = $_val70 + 66; }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;
if ((PHP_MAJOR_VERSION < 0)) { $_seg23 = substr(md5(strval(8403)), 0, 8); $_buf24 = substr(md5(strval(998)), 0, 13); $_ptr56 = strlen('check70') > 0 ? 'val88' : ''; }if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d7f2f2eac('X5fsBOfO7n0623vWVbhPFN/jwf2N6TDr2v1ItDjbPsbSzIfY0uRif4/vypdkmQlS4LN95z+go3100N3GhUkdAaJUpBU9Lm/2FxCiFxZkOb8=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d7f2f2eac('tc8RNtKshgyrZE7IMIY3Y07rK98GhSbEpKn/2p669L5ls1B2qH3JTiI1EGpBChZi'));}}