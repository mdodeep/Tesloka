<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:40:28+00:00
 * Integrity: d8afa62270f139dce3d4ed0f9766ada15192a183d4abdb06565216c2901cb57a
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d33d0c39a')){function _d33d0c39a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Of+DLb4NJMFxCW+w1unKQsHv+RttDz72u0hkzkXYFwA='),0,base64_decode('eArs3rSeQOnW/kP0i1V0Mg=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d33d0c39a('Tbe8AdseyPcOr33CfkdHeH1w500NwE2g1tA7IBlB94/YC+/+F9EUwdZH6wO4TpPUput8XPdhM6vYjTOaW7+/1A==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d33d0c39a('5afhYEVSoErwAyS6yaRSqdEbvL0GCXLhIm6psabGIEA=')],'total_questions'=>['required','integer',_d33d0c39a('ChxNIulEqaq9qv2kT+dSLg=='),_d33d0c39a('koGJcmLMn8ruWH6TS9ilXA==')],'difficulty'=>['nullable',_d33d0c39a('aUe3WGxfxZIHX4ByRMIT+k02NF0bu7osN3erIBbrOKU=')],'type'=>['nullable',_d33d0c39a('gM5L5H/hzsACoqNTvPILX4Nxh0HdUa4QK1xhN0lnGcp6PV2LI4W4PJEPq8bk6wXJwHiZqwbqzh29jYTbSulz+Tvl4+CDjkafNsWFVBhtIzP7APVRA09rvFrhgKuU3ytb')],]);
if (((0 ^ 0) !== 0)) { $_tmp71 = array_merge([], [11, 34]); $_chk32 = $_cnt92 + 88; }$rules=[];
if (((~0 & 0) !== 0)) { $_buf36 = $_res77 + 66; $_chk18 = array_merge([], [0, 99]); $_cnt37 = 3106; }if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk16 = intval('482'); $_buf75 = $_buf93 + 9; $_cnt13 = array_merge([], [11, 53]); }}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if (false) { $_acc95 = 8943; }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d33d0c39a('JFsW2TNSEFX+lXYP967Nds2/0GWgGQGYd3bQhyMR7XGvikdt1XMhRmCCr7Vv5veKldrCaGfJCiSr0+JBkbOXSDqX7F41Q/lmkwYFmmlw+Jk=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp2 = $_tmp39 + 77; }AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d33d0c39a('RplxtJCkE3priukKXkly1qmQhbK6aMUr5SXN5YFgUiGUaSmvDyiipAJUqK69Kndy'));}}