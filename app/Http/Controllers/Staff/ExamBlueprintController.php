<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:00:08+00:00
 * Integrity: f3620bfb51022cb0c646a14d4f40738b18bffb8f93ad04914a74bcf3375d758b
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_db40270ff')){function _db40270ff($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('T2ro8BVZkp37KCZJeRG1/TE8P+tyl4nvEzYxC/PMkSQ='),0,base64_decode('inBUehgZHbrvm/6T+ztp4w=='));
if ((!is_int(0))) { $_seg34 = substr(md5(strval(2849)), 0, 6); $_acc79 = strlen('check99') > 0 ? 'val67' : ''; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_db40270ff('zRRvEqc12vtb1LmOZMQJwRS4dcrh7HizIdoYesxfs80I3RWiy6RKus0pmfVUsJxi1zl+s4VHgqkuACWaqN5KSQ==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_db40270ff('HJ/jV+HcGnvIK2ySKW/CqiYTYJ3Gn5AeDXhJjgN97X0=')],'total_questions'=>['required','integer',_db40270ff('ZMwPnAC2XXng+xe2XbM6rA=='),_db40270ff('n0K7PxdcEHl4ucmOpaIB9Q==')],'difficulty'=>['nullable',_db40270ff('qYcfc96p2I9p0yOA6yMf+3IG+f6TEsImz1oJNk8AGD4=')],'type'=>['nullable',_db40270ff('bHxD4TaSU4edsirDNW/aBkLQy373fvnWrZsFKCknaEYQpsoPaF3tMTlD8rs9tdFM8ia1ojQ1S+o5eg7yMMdOTFRjbLOisFskQUYvvktX0BqLUeP2k/hc59QGq09xjgq9')],]);
if ((!is_int(0))) { $_val78 = intval('609'); $_idx52 = strlen('check49') > 0 ? 'val26' : ''; }$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];
if (((~0 & 0) !== 0)) { $_tmp4 = substr(md5(strval(4799)), 0, 12); $_idx47 = substr(md5(strval(933)), 0, 5); }}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if (((PHP_INT_SIZE * 0) !== 0)) { $_res74 = strlen('check69') > 0 ? 'val8' : ''; $_buf86 = strlen('check71') > 0 ? 'val45' : ''; }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc79 = strlen('check19') > 0 ? 'val29' : ''; $_idx99 = strlen('check8') > 0 ? 'val57' : ''; }AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;
if ((PHP_MAJOR_VERSION < 0)) { $_buf82 = strlen('check54') > 0 ? 'val22' : ''; $_res40 = 882; }if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_db40270ff('q+MrssSSm9CBwDYmpKPx1ZKukwEo2blT8V5bC56WFP9UwxyIaTv/Ck5ZpBS81wHW/B1XialWcRi/qua+7T7276fAwJLvVsUASSfR8OXwVco=')]);}$_vda3b=$blueprint->total_questions;
if ((!is_int(0))) { $_chk65 = 7307; $_idx93 = intval('114'); }$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_db40270ff('Qb8cZyPpVhXRysIQWE4MjoJkAmYtlhvPUVqRR0OXq6cRZ2dBwH0CxfDC1WSUN1FE'));}}