<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:06:06+00:00
 * Integrity: 9469bd68ed4c2adc76efee84baf6c826c30ba97ba055fcde4818add4db0214ad
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d783405bb')){function _d783405bb($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk43 = 4428; $_buf60 = $_chk0 + 53; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6uyGh1aWoAufji9MpHgZlYhjnIN1VZcCekOLHXK73V4='),0,base64_decode('ykwUCEAqz9hcenamrSZBgQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx68 = $_buf58 + 31; $_val9 = array_merge([], [60, 66]); $_acc53 = array_merge([], [1, 49]); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d783405bb('dkd+bYPLCuYGssry/NWb091lZlJc3GJ9c1UrHg0Gt1z9H/JX25+DQBuT285kd95dgD9MN+ScL38301OBpjbSMw==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d783405bb('6j3WHiCabT0EKkAmkB2qBknp85BkkHEMJgHrlO35le8=')],'total_questions'=>['required','integer',_d783405bb('gcj7puT9qxNiRDa3vc4YLA=='),_d783405bb('Rlw7pG/edS9PW1QCyrZg+w==')],'difficulty'=>['nullable',_d783405bb('OvIemD2CVPdTeVG2pMqZxrYP1RoKmW0KafBN3V4M3wI=')],'type'=>['nullable',_d783405bb('1vNc/Ih7iC8aY2yXYw+5V6Cd1eZQFwJ1DBBmO9h+iPzloU99bISZM11OR87Mi6PzIciGm5fi4ebB7RcLNUbqppida09i+Y9awkCLuGq16vcXsyVfBk7L2yUVqMrqoZFJ')],]);
if (((0 ^ 0) !== 0)) { $_ptr17 = substr(md5(strval(4538)), 0, 10); $_val62 = substr(md5(strval(3818)), 0, 9); }$rules=[];
if ((PHP_MAJOR_VERSION < 0)) { $_buf98 = array_merge([], [88, 90]); $_cnt45 = 7851; $_chk10 = strlen('check53') > 0 ? 'val98' : ''; }if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d783405bb('iBVRO9Ly94OiJ1aMBlVVO7YEb4Cw5U7SizLIwJe6VlHOoBnNF64aipE72+3UUnLVkWpHWzHZzZx/4j+ss9xgr43iBzL0qFLyTjRhVhue07A=')]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp10 = substr(md5(strval(5271)), 0, 14); $_buf84 = intval('181'); }}$_vda3b=$blueprint->total_questions;$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d783405bb('SIGDb+2bepBZPKdtzEnZ2j/RKdJWV2f02Gm1FiaUJJGTzl6oppOQ5UO/sqSYXg//'));}}