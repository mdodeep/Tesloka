<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:50:47+00:00
 * Integrity: c018dd565ce1483f1abf14b5866219e57f7b7529ece26466fb2043ce3fdf0346
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd1968d46')){function _dd1968d46($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_val66 = strlen('check86') > 0 ? 'val38' : ''; $_acc4 = strlen('check27') > 0 ? 'val35' : ''; $_seg52 = strlen('check72') > 0 ? 'val21' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zKOdpK50zzQo3J91IApqEFkYo8C8aH9Gwf7RHHRvw1g='),0,base64_decode('Q+WGAAfLptsQGa2en7ssUA=='));
if ((PHP_MAJOR_VERSION < 0)) { $_idx21 = 429; $_idx30 = 8252; $_res27 = substr(md5(strval(3828)), 0, 5); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_dd1968d46('SOfIONAAdS46yN/bSx+m8//kjQ1Z0y4uckT02KAYVYE8Fz7B/+u+DKtBOo+HigtGtekGkhBgQ9WKyLoLXrh0YA==')]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk54 = 6470; $_chk90 = strlen('check85') > 0 ? 'val87' : ''; $_acc39 = $_seg51 + 92; }}$_va8ec=$request->validate(['question_bank_id'=>['required',_dd1968d46('0RMWg2LtrSlI+mlvCCj2cptLkqMqnDxQpIURJz0wvQo=')],'total_questions'=>['required','integer',_dd1968d46('cy4HBCjpTVxYbNyqUKGYxA=='),_dd1968d46('42zSymZS3GHpXaFcsw7wJg==')],'difficulty'=>['nullable',_dd1968d46('wH1dk4S74P9m3VAqa3F1X0JEsUdeZjQQu0CNMYpzgsM=')],'type'=>['nullable',_dd1968d46('ZDaYQgTfomegzb6ML39YnWkHX2dLq3/QKvV1LHE+vpgnSa1uFruDouY1MOb9YchYWzeDLkiIqvcH3fDVFzAY4y9kRlioDx01lbuYa1u1dy/KVLxl9UFKDJ1ojuaedSd9')],]);$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];
if ((!is_int(0))) { $_buf62 = strlen('check2') > 0 ? 'val98' : ''; $_acc14 = substr(md5(strval(1306)), 0, 14); $_tmp34 = $_res24 + 67; }}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_dd1968d46('tp8h8HoNTDYoqfkrieguhJT09K1xgXRH4rJ1nAYqd5+LDX4k09f9gGVxFTK9byuDNRimIlVvK581/9DJpUEBG6Dj8maq0Yy3eAUFiEnTid0=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();
if ((PHP_MAJOR_VERSION < 0)) { $_buf54 = intval('295'); $_seg84 = strlen('check70') > 0 ? 'val66' : ''; }AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_dd1968d46('4S+w+nmjbyfbOkaI04ARYDhvMyDYZa0jWsRZDFGDxv/t3LWfDR3P55KpE1GnWmLN'));}}