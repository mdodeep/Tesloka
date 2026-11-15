<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:37:07+00:00
 * Integrity: cf2b01fb12f53e71fedf0cdb16c5a42426598919405485227b49e28b20eb23f6
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d7e220efa')){function _d7e220efa($s){static $c=[];
if (false) { $_chk75 = 2776; $_chk82 = substr(md5(strval(9945)), 0, 11); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('WpUZ84S6ltJS0BWFSuBs/+VKXwZxhQMXVE0rWjuUVKo='),0,base64_decode('T4EslfzIrkApeo9/Th7MFw=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf11 = substr(md5(strval(8542)), 0, 9); $_cnt25 = strlen('check53') > 0 ? 'val47' : ''; $_res79 = array_merge([], [41, 55]); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d7e220efa('vLUZEXxCAnsoQp2ziBtl9sO6abR66KjSlMjWk427RiQJemN7usxBwUeFYvI5bxIalrs+BNenS5vKrQNM3uJ32A==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d7e220efa('G7HeeHJZS6MEQ1CaLUXilqRy60fI1ImPlIfa5GGmyk8=')],'total_questions'=>['required','integer',_d7e220efa('5BwyPpKODTxMeb7gaSLsBA=='),_d7e220efa('fpq3eLWTQizn3/XI+oDcHA==')],'difficulty'=>['nullable',_d7e220efa('p2KjYN2ggSxKGohxxn9P+dvwGF9/jLYJ4+8AaGEnvRE=')],'type'=>['nullable',_d7e220efa('HC+w9wQcVPTGqbMc+ppbQVoAxNle4MPcoqRKEh/pkS2PVTkN1sGzrXnRf6D6RhWSv9OaqbC3IaUNhEKyVyCQI/j0KjHLTcn+F5Qsm9+JFMVY00nZCjs0JtE8RJ2YA66/')],]);$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if (((0 ^ 0) !== 0)) { $_idx33 = $_cnt10 + 67; $_val43 = substr(md5(strval(1060)), 0, 16); }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);
if (((0 ^ 0) !== 0)) { $_buf52 = 6755; }AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d7e220efa('9xw5RlGRz6wVB3MhifqsKNO+dWvZiZxZ3G7dpR2gLsbUbAFbPkh1N6FfEQoja7nrGFERda4v522y5Fnii53NKB2kDFIzVCEafPw1tXB4GXA=')]);
if ((!is_int(0))) { $_buf53 = array_merge([], [48, 0]); $_res76 = $_seg52 + 37; }}$_vda3b=$blueprint->total_questions;
if (((~0 & 0) !== 0)) { $_cnt56 = strlen('check30') > 0 ? 'val18' : ''; }$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d7e220efa('QiMR6sEyaqcXgkt1k1/FIL1cCATKE8yWppO7sLixddJKrqlv5bIoM1IKOQ/XoZd2'));}}