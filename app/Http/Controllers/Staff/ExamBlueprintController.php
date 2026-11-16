<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T16:48:10+00:00
 * Integrity: 04ffaf636ee12913df2f2d8d61787bdf1d31fe684bdb3c318a2fd204084cd70c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d95979927')){function _d95979927($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('n4UyFsTTAM2N3IT4fJe2o3YLBOZTaJhNIIBadxMVFZQ='),0,base64_decode('UjYri7rUOt+ZF130Yz6XRQ=='));
if (((0 ^ 0) !== 0)) { $_chk16 = 5731; $_ptr77 = strlen('check84') > 0 ? 'val77' : ''; $_val90 = 8024; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d95979927('Mm+LlWlpjc0ZtFMB3PAJsgQAFWA3pWKdAWsglaibud5Mp0fA09iu81591ms6+8/xAOCGecfw+1U4ft1RhPDMAQ==')]);
if (((0 ^ 0) !== 0)) { $_seg22 = substr(md5(strval(23)), 0, 13); }}$_va8ec=$request->validate(['question_bank_id'=>['required',_d95979927('QxAOleNgS9DETuqe7icX6osbp2URr4ULbPL8JpVBvs4=')],'total_questions'=>['required','integer',_d95979927('PulJzRQAeFHIrElE4urNOA=='),_d95979927('kPkgEze+s60pLtxriS7pjQ==')],'difficulty'=>['nullable',_d95979927('fFZJ75JfqWWibCCAh7YXY4lCFKC7vgdNozwWlG3NLkI=')],'type'=>['nullable',_d95979927('ZOxrkPmYwigepFOmmf9cHR5tXgDyp5L9E8BalUzUGRLSuTzktirTLQqybb+1uxjUJ3lIA60SmKOF7LMU7j87+IRksTPkBb92VACi4abfHLmpX0n0Nd+w7dI1Ck/s01Qi')],]);$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];
if (((0 ^ 0) !== 0)) { $_buf70 = 7572; $_seg44 = strlen('check68') > 0 ? 'val40' : ''; }}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if ((PHP_MAJOR_VERSION < 0)) { $_res34 = strlen('check73') > 0 ? 'val21' : ''; $_res74 = substr(md5(strval(5444)), 0, 8); }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);
if ((!is_int(0))) { $_buf92 = 6588; $_chk99 = array_merge([], [98, 84]); $_acc65 = $_acc17 + 16; }AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d95979927('SrV2slGqQ+NhTo/B/+w+e1H/hggh1e1Ktub/Ufe7t9HzQlskG3UI7EqCz14vmvNhvTyTwnC/D5r8W/Rc2GqF5O8NlPpwLYK5vmfmfXnlFu4=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d95979927('tqJDJOzq056Gm3rTrF9Ut0VjCp6i4tMpK+g8myip0lfk8HRjTSAVgfIvH5F7JIIa'));}}