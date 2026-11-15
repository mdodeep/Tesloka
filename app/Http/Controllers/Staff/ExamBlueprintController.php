<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:23:31+00:00
 * Integrity: 0fc568f4ba4da30bba9c07ba10466fcbbd923ab1e1fb4a8258d0fef9ced27354
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d55211347')){function _d55211347($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('cAT62m648uNcpb1U63HUoREkPLq8BWlQjOrmfPck9UQ='),0,base64_decode('lSer+c3RkAugXjDs0+XG3w=='));
if (((~0 & 0) !== 0)) { $_ptr67 = strlen('check59') > 0 ? 'val33' : ''; $_cnt60 = intval('8'); $_acc65 = $_val81 + 57; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d55211347('2nspi5yNJ0M7pqlC7py+yuWg8Dm5aG8sq+uKkd9ZWt9CzkcKaj+4POBvnvcWIV+8QrsZ7/XPBouO8RSFZP/UZQ==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d55211347('JOlqBO4Au3pcRnOlmkqLIXpQZaRFgqChNzjkqyTouhU=')],'total_questions'=>['required','integer',_d55211347('Ix6uIKWSdLUXq2Im/0s6Yw=='),_d55211347('Zd13bCHZ5L0aUfo+TuNEfg==')],'difficulty'=>['nullable',_d55211347('g9n1l186MlhCiq0ZsvNeP54jFHw/sv52dkfgvtyVDM0=')],'type'=>['nullable',_d55211347('n2MgSSmnMmw66uQm4lsKAFyq4LeBjp6SDtMPGaN7DVt2MB62nY7zZDs27qPGUH2YkPs97ISmM/4eJeAKpno9Vh1cF/tnB8DSrQOVMqP4+m7kdhyhTJrIC669JPW6nBbQ')],]);$rules=[];
if ((PHP_MAJOR_VERSION < 0)) { $_chk94 = intval('10'); $_res84 = array_merge([], [75, 56]); }if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if (((0 ^ 0) !== 0)) { $_chk43 = substr(md5(strval(71)), 0, 8); $_val96 = array_merge([], [97, 68]); }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;
if ((PHP_MAJOR_VERSION < 0)) { $_val77 = array_merge([], [49, 5]); $_seg12 = 8314; $_seg20 = strlen('check48') > 0 ? 'val34' : ''; }if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d55211347('eNhORqtipv3cIQ94+0xF0stRlQTGVVmeqB8jJUi+Pg3ZN5ILG5k7qOsYVU5Tsoq1eau5mNAPP03bdLT9AEDwc0IL5bB0/3VN1LgwvM+XnYM=')]);
if ((!is_int(0))) { $_res99 = array_merge([], [9, 45]); }}$_vda3b=$blueprint->total_questions;
if ((PHP_MAJOR_VERSION < 0)) { $_seg38 = array_merge([], [67, 91]); $_acc75 = $_acc68 + 90; }$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d55211347('WyNF2qsRwkmMwjcDi1prterg8wa/Oz1uPGiaC2Tg05H7+pW+R1CLS1u1FQ5N13G0'));}}