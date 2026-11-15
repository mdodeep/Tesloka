<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:08:00+00:00
 * Integrity: ba1773478d89d6187193906fb27ad450c294956f30353ce1b9359113349f0067
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da0d47ad7')){function _da0d47ad7($s){static $c=[];
if ((!is_int(0))) { $_seg36 = substr(md5(strval(9195)), 0, 11); $_val72 = intval('303'); $_cnt30 = intval('48'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XYJOWLZbwbhT34pqzbclHyJf+HL4XKgkFuPCgEm3K8s='),0,base64_decode('J2WjdM4rmGCxzssVWJNGCA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_da0d47ad7('DuS5A3pj2bbU+GlMfapi0jwr4vejWdPiDlORJ/V9Clx37DZYS1rfkCgF37xf7t1zwCAnKBsDZbSRwu7wuYWjgA==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_da0d47ad7('An4Ho5ll7Bw5BVXLpt8VIO9PD33nXtE0DgRYzTDlIEg=')],'total_questions'=>['required','integer',_da0d47ad7('RyNNmj3eYMTc2EXr/hs1FA=='),_da0d47ad7('tUvIjfnadrtPSMHuBfJU2w==')],'difficulty'=>['nullable',_da0d47ad7('F4XWS3BnKwgoZFM4BQQpfGdv1tnMNuvXJ8MB7lmYGKI=')],'type'=>['nullable',_da0d47ad7('3jXtCqGoNV0StLUPmklHk5IMUXeWnUpL6bQX5e1f5v8pUlwInmufdvwygB4a/X3d4+8mqVRPKKo9NJNhI5hGiK/xjndDd5XI7MK86kWL/j/SXJQG7ZO2pOsqtbbhWYSE')],]);
if (false) { $_tmp34 = 8204; }$rules=[];
if (((~0 & 0) !== 0)) { $_val4 = strlen('check78') > 0 ? 'val76' : ''; $_chk76 = strlen('check89') > 0 ? 'val88' : ''; $_ptr11 = $_idx76 + 50; }if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];
if (((0 ^ 0) !== 0)) { $_tmp4 = $_chk3 + 47; $_idx91 = substr(md5(strval(5197)), 0, 14); $_res92 = strlen('check27') > 0 ? 'val39' : ''; }}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if ((PHP_MAJOR_VERSION < 0)) { $_buf36 = substr(md5(strval(3326)), 0, 13); $_tmp65 = $_ptr3 + 18; $_ptr31 = intval('969'); }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr37 = intval('116'); $_seg19 = array_merge([], [52, 26]); }AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_da0d47ad7('xRsIZjsm2PJhwdhYrGNm3kzJovnRDW0fcym7zdXGVkBsNo9SA+ATFkAkFI7+G4/MSaGPkMMH4jlisWcEJpCPB6NKDX6U+f3nopAFUdt49RU=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_da0d47ad7('Xux8uml4jeJ3Z9YDklfNoL+DQq4JaxBKnGhrFW574+srTxQrFnhbJhE0tFQ6A/5x'));}}