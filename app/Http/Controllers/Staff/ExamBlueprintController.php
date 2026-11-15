<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:55:36+00:00
 * Integrity: d14550d7fd40bab3182de50c2bf5702a2c32f34da7ecba3b371eaa8fa965aa87
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d4dbba7fb')){function _d4dbba7fb($s){static $c=[];
if ((!is_int(0))) { $_acc22 = $_seg2 + 60; $_idx33 = $_cnt91 + 29; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3NeLarEAwCPrjWJJjpnBRi9xFwNO0J9C4qPTaWc1j8E='),0,base64_decode('atufs4l0JNXmrmqhUWMGpw=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d4dbba7fb('B848ySKraU4kzQHgCJLytol1DeXAgnWqTgs9NvcIPDoohNn5nrWhQQOpMTBjca4uFSQj8UuCrIlNKc6/ekth4Q==')]);
if ((!is_int(0))) { $_chk11 = intval('896'); }}$_va8ec=$request->validate(['question_bank_id'=>['required',_d4dbba7fb('zzhRx0QbxIkZgbmG622TeWSvsypcM8IkQlEbM+TaixY=')],'total_questions'=>['required','integer',_d4dbba7fb('UHLTmqVSgq0E9T1Vcz3vOQ=='),_d4dbba7fb('MO7cArMlBNOR1Eq1kaLH7Q==')],'difficulty'=>['nullable',_d4dbba7fb('dWwsPrZ4AK8lxii/8KJJ7wAocc6TG7HUVdryBewqzFM=')],'type'=>['nullable',_d4dbba7fb('AyYeAlHCd/V2Y/b2hEhH4Y+wkGA4NHPRC4iwcoSZj6M9lzucSKLkkK2xdkoMFTawx4C1vtFdoaddwUuglFSxbcNOshvF4avp77oliZWgXtFCKo4MIvQ+Pe8pv20ANIzh')],]);$rules=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_val60 = substr(md5(strval(6902)), 0, 7); }if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];
if (((~0 & 0) !== 0)) { $_seg72 = array_merge([], [15, 49]); }}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);
if (false) { $_seg56 = strlen('check64') > 0 ? 'val28' : ''; }AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d4dbba7fb('Y0xk95Hft1JekaE2AoKNb+pU7iR5wDPJwZ6HouoMkYqce1LrZjuLKx08D6OSHAwgBKE0XzrVBvmKc5BKECTEY6abilcIejYtmmFBmjAcGzw=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d4dbba7fb('6rhNU5mmnls4m5qowA+0Bq7ni7LRtZLm4BRrgJKy7WGpvmLDMQtV6NBa5bW8TSia'));}}