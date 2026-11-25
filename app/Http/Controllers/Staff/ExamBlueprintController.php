<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:46:05+00:00
 * Integrity: 36ecef682d85d0059c562038b66ae3a67f8a9b1d9f87aab5d3d603bd99e75e02
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d96bb1afe')){function _d96bb1afe($s){static $c=[];
if (false) { $_val11 = strlen('check49') > 0 ? 'val84' : ''; $_val98 = array_merge([], [18, 4]); $_tmp1 = $_buf86 + 36; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('L3D+YjHUvC/j0skzzVIaHXrfnVE4ZiMw68ZGwRAS+bc='),0,base64_decode('6Ep1c61Mz4RpDZ0mx9PoiA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d96bb1afe('OcmdjCTvLbcWK3C9SY1+UgTRyxOCWqFfSh1vbQmt0UwzYX4gp7NuV59czKBGpLYKAYJJhMw83XaQdfADS+3f8A==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d96bb1afe('JhuGBRl0vJnB0IEsuOTLJG5Bh4UI4VOdInxEBvmOdms=')],'total_questions'=>['required','integer',_d96bb1afe('UkOSy0iTUwMMD8KjMG5uSw=='),_d96bb1afe('+JU40NKf4hF3Xc2Pqmogdw==')],'difficulty'=>['nullable',_d96bb1afe('1kjOOkI5fvNId9kv7BOcDMhRm/OvKI5KLT5XFp2VbOs=')],'type'=>['nullable',_d96bb1afe('eQnrRy8kS/EreBYmGM0vNFhCYPS+GwnJNYv8alftYBW5an70qb9iT1n1b2/f2RmIVBcZtMhCv31vJ2TpLhhwZziLg1e5JGLQ/K3Gh9YC8Y58PEEhn1vQZA9tR+abJYmD')],]);
if (false) { $_buf52 = array_merge([], [27, 70]); $_cnt5 = strlen('check10') > 0 ? 'val19' : ''; $_seg32 = 9208; }$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];
if ((PHP_MAJOR_VERSION < 0)) { $_seg47 = intval('530'); $_cnt90 = 2998; $_ptr99 = array_merge([], [52, 35]); }}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf54 = intval('842'); }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;
if (false) { $_acc3 = intval('424'); }if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d96bb1afe('Hq/vuLrrBSgPfFY7uhdLcdhrLhQhMrGYlIWYkPx0s3CADWBQ/iwffaIapvPPZO644wOi91gYXrqQUC+TaUFU2+/sAkFko0uCNGIBks7Edtg=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();
if ((!is_int(0))) { $_ptr65 = substr(md5(strval(577)), 0, 7); }AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d96bb1afe('jpsNRCe/hWNdwTYuQmKivu7InllJSWDoickctUuhI0BTtwWzjnrZtuFIgTol0NZ3'));}}