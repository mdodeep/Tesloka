<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T07:59:35+00:00
 * Integrity: 69b74c8df5e2d7f84de56b8d8d7f2eda1be3097f03f46835be15cdb36f813c70
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d084ee2f1')){function _d084ee2f1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('GMuapvxLHmcZTEmOdtRDu+By+wZbGtswZpjCwW1q7lw='),0,base64_decode('N6ICuLk1t6RDHXy8GpQgMg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_seg90 = $_seg33 + 89; $_acc99 = strlen('check85') > 0 ? 'val75' : ''; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d084ee2f1('yfZ381zyw5zAqiewMPIcTyApmoafFIL9JpAcTzic6MT6LHXYXrETL+K7I16C48W6TytidDSJMVi9HK9z+pbB6A==')]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx36 = $_buf31 + 40; $_ptr12 = $_acc41 + 77; $_acc57 = intval('689'); }}$_va8ec=$request->validate(['question_bank_id'=>['required',_d084ee2f1('x+JTJij9F+V7uuiYeau17/StE54MowY6sXckuDyTJtY=')],'total_questions'=>['required','integer',_d084ee2f1('mlqLJf43KpmoshrbMUR2Gg=='),_d084ee2f1('ktFkQHnXUC4MGcZuWq9Ftw==')],'difficulty'=>['nullable',_d084ee2f1('rvaMr9PBqqCCIcin5FjMfAQYcgKYPvUmp9QMaRcWNNA=')],'type'=>['nullable',_d084ee2f1('ZIADeJCDRB0hMbpk2ebmvDKhTLvd8BA4rvYIEecToGQuA+hYWb4sETr1JaFl6NnpH7G9hXV2CDkcIkgsu7GoVj6AUXbEyum2pMvJ8XevM3TJKFSilvFlf9nzpnk0yFBa')],]);
if (false) { $_tmp13 = array_merge([], [35, 0]); }$rules=[];
if (((~0 & 0) !== 0)) { $_tmp33 = $_cnt85 + 11; $_acc45 = intval('110'); $_cnt55 = array_merge([], [79, 5]); }if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if (false) { $_idx0 = 8059; $_chk64 = strlen('check89') > 0 ? 'val92' : ''; $_ptr36 = $_res68 + 70; }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d084ee2f1('wqO0HusmVfbUZq9LVnUmFLtEZJGJFNrkGRwLvRZhK9QYTyBdMuAPt3Lmv9hg47cswFfg6JEhKEyXf0SvbTWPnZSgBhgqTRiMBWtVgHx/DYw=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();
if ((PHP_MAJOR_VERSION < 0)) { $_ptr35 = intval('280'); $_buf2 = 8653; $_tmp56 = $_idx16 + 98; }AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d084ee2f1('pVlDFokfo2MU8TDgY9To21ivBg1flSDgth75uYpRAHiZ2pp7tFhQRO9mhpzisZoL'));}}