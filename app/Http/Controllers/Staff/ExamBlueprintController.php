<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:34:31+00:00
 * Integrity: ebf1f91866326a3c04ab24e991b93ed175f3712abe0a3347f1a4689aaae07202
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dc8d96512')){function _dc8d96512($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('47s++JPqtXgScbgrqS/rk9FeSKD6dmbHQa7aZ8aY0Ng='),0,base64_decode('V2njvKIrPrcJRQNW9xtmGQ=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_dc8d96512('dx26dFhRnKeC8mOgfGtQmw/R5bIq8I34lIaCMx66mTO38EkoMS0XT4U4FudHhhBpZDbUXHsfKfa/G0RHXyc2XA==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_dc8d96512('ytm2Mag+dNoQf6f8/fs3oIwEAOChBXASbKUI8UbbsuM=')],'total_questions'=>['required','integer',_dc8d96512('sFiGsoOWhelQ4hKotbkA9A=='),_dc8d96512('suNi8UV3AsN/vNOL1mxLjQ==')],'difficulty'=>['nullable',_dc8d96512('uZgDfL5iZtPyJiLofpVLkDT3u1EE5AFYvkbsy6W6igI=')],'type'=>['nullable',_dc8d96512('sxogZ+VqeyiLWVzsDOEyVs3tPVpm6ePkfi2PvwdV2U/X283Qn3FIchio89+zCvvMlrWsURoU6r1ob+0e/XnLl4bgM8swI2C6R8RhB/2lZ1MpAiT8jn+zEyLP2xPMUqe6')],]);$rules=[];
if (((0 ^ 0) !== 0)) { $_acc0 = 6715; }if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;
if ((PHP_MAJOR_VERSION < 0)) { $_seg26 = strlen('check46') > 0 ? 'val9' : ''; $_buf12 = $_tmp33 + 60; $_chk65 = array_merge([], [10, 48]); }if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_dc8d96512('DV6G4qhjMaek6+mYWOPs2tKMxmcuGXWuQflNCRAkQmruxIJbmi2u+WFtPH86tf6JOdVm5H4aTUSVHwDrieK4Gmin1So4NmL1GShl/Kwflis=')]);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt58 = $_buf0 + 32; $_val95 = strlen('check39') > 0 ? 'val70' : ''; }}$_vda3b=$blueprint->total_questions;
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk27 = array_merge([], [48, 53]); $_tmp83 = $_acc40 + 54; $_acc18 = strlen('check76') > 0 ? 'val65' : ''; }$blueprint->delete();
if (((0 ^ 0) !== 0)) { $_seg90 = substr(md5(strval(6568)), 0, 11); $_idx37 = $_buf17 + 65; }AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_dc8d96512('qoeR38gUZ6//FkaT2ZgJ15hqvEVj1gsMXZj5tyRo2TfVbwtZC1gMcVheIrXVZX9M'));}}