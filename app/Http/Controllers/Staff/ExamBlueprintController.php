<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:21:21+00:00
 * Integrity: f72c16032508f56682d776a99d37c35b9badc46c4ea64704e541c806067bf8de
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d98729353')){function _d98729353($s){static $c=[];
if (((~0 & 0) !== 0)) { $_acc44 = array_merge([], [88, 65]); $_cnt31 = intval('330'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('CTUBksc670T1oEAD8mJxTJVoSJ2+5VxIk4Jry88sOFo='),0,base64_decode('6r6oC8kZUIOSTB7ofZszyg=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d98729353('pBRp8JEEMiq83dSZeL0+tn31OQSbMW3p5tPRwPdCBqAxtdCq5SpStFrrGQa4F66MswBAFKJvTMKC0TemKi7ajQ==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d98729353('ZcANDRZ6HSfzZO6bxl8JdvGMkoF/KtVR4C+E3JCmg4w=')],'total_questions'=>['required','integer',_d98729353('nVaQRaLNpUuRb+N8oXsXuw=='),_d98729353('86btHqDhxNskVdNIFxBxBQ==')],'difficulty'=>['nullable',_d98729353('e1HToVEvyeKr6B2Ask348OS2mhZ3TjqrzFsTb4ZjOY8=')],'type'=>['nullable',_d98729353('vDxHmj7dsZGfUT7j5/T+bayXbmeTrMSJKo9J21gF0F61ZN9VXCMl7jW6Eoi3YcXRtg8h0Sw2sAkRNB7lwoMOpvUNEr9IlsZmT+c7U42pc2cgEpNhKkAnuh5ZnB5ebMaH')],]);$rules=[];
if ((!is_int(0))) { $_tmp36 = array_merge([], [26, 34]); $_val37 = strlen('check39') > 0 ? 'val69' : ''; }if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if ((!is_int(0))) { $_res12 = array_merge([], [12, 44]); }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d98729353('rpgy4d3pnXBx5t6R4P9RqRHN06ycLHYbQnL+VVOlxBJV8vUTvZqgJGJhzct6PDGsKD3VQ5DGhIHCq9psegoFlWBExodXtkGP8EcHlwXK/Lk=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d98729353('KKUrVVNiLlHeML6CysmaWC6OuKr62Rf6J/b+VeJ6BlXd98NagJLO37NELJTaQiWW'));}}