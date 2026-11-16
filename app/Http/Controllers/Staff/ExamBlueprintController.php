<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:47:04+00:00
 * Integrity: d6fa10690920dbd5e30e48ac785d7af54e3187991f887a1b8f9970a8b5c2e0ae
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_db0ad134c')){function _db0ad134c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('fYylCwUUKGZosNvJa4cBLHGplTEmegZ91dsxxK+xpT8='),0,base64_decode('20Sfbr2o51b7yzvhmq+FUQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_db0ad134c('Y+72i+p6y78Chdlhz2bevL/DLgskkf7OSIIyW2EZfrURKaCdIhUO//Adxu/9r+aRcWrkbcp20iDjzggdfZKvLA==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_db0ad134c('usiKxIfpv4/2/erACzC9GKIH9FD5xgt9K08APNfSph8=')],'total_questions'=>['required','integer',_db0ad134c('MU/wZNtTbbNA0YrcHfWGWg=='),_db0ad134c('I2AS/2jGY9o3GkGXxmGKtg==')],'difficulty'=>['nullable',_db0ad134c('JoDeigd+Lr3IcjMLuv9bwiR8aS3cNSw5awJcE14vyDk=')],'type'=>['nullable',_db0ad134c('pBftfkR2X1PISKYTLkkFRnHa0Pwep9EumNpVZjWX0It0m83j+9eQQWqcI7uSCGxJLmD/cufm736/AhGqNsnEpmtrd7Jdyt6d81bp5syXNPJfK0WRZi1qZQbgti4H8rAz')],]);
if (((0 ^ 0) !== 0)) { $_cnt5 = 9449; }$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if (((~0 & 0) !== 0)) { $_chk16 = strlen('check34') > 0 ? 'val75' : ''; }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);
if (((0 ^ 0) !== 0)) { $_res67 = array_merge([], [40, 70]); $_tmp47 = intval('767'); }AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_db0ad134c('0zOPXbG9CIvnkh+Ws32jRJBQAoXyrH580SVEYXAA0ajNwljZy5DOS//u1Nur97+z+gW6vQ2Y9Bl+dta+pRFOfCn/dTNX7P98SmNLpPQCfSA=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_db0ad134c('o6m/0zjVkb0+VuQ4RwBaqCD38kI+xhUQ3KPmBn3Q3cnBN/Z1z0gVYAKa7ATcwy8L'));}}