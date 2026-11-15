<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:46:24+00:00
 * Integrity: a5fe8a6e13561eb216092d910b450fccbd45b4e76c28683aa463ab9bb44335d2
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd631764d')){function _dd631764d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Dh9saPjypBiriy5dNzjYWdYRiJ06WcsYIejBGX4M3HU='),0,base64_decode('dLfF9i+ExdY3nc2qYzLYJA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_dd631764d('IAUuFzAN07zLIoKtqzLsMIE7ZLCvoIJozJMBMC57nRPoM6dpvwqWaJQJCKPK9JvdPBvcR5yBf935Z3Q6G5p/4Q==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_dd631764d('1K3y55T8BSbmxaPZZPIH0IImD8lpWmBukt6nEzoVMEg=')],'total_questions'=>['required','integer',_dd631764d('75MfQSA2NFoSyAKor77rVQ=='),_dd631764d('RyHFc1ij7DzbDS3Eyi0V+g==')],'difficulty'=>['nullable',_dd631764d('XUxczSM1nHCMm2o5eJgAiV26fW8ZV8rwzk0NojZ1zyA=')],'type'=>['nullable',_dd631764d('RtWTukCaA3G8he6KExqzTOgJzmzGBVphUqSDoSbRquPPuKx8tlWoB52O1WWLMysHe82MG1xwc45mXZzOAe5OyvSdjNtmpg9XV6VW+Rog/RJLmHDlZ+KIfCiaJjcHnIoA')],]);
if (((0 ^ 0) !== 0)) { $_ptr64 = strlen('check7') > 0 ? 'val91' : ''; $_tmp58 = strlen('check90') > 0 ? 'val31' : ''; }$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if (false) { $_acc94 = $_buf75 + 16; $_cnt35 = 4066; $_idx2 = strlen('check51') > 0 ? 'val24' : ''; }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);
if ((!is_int(0))) { $_tmp75 = substr(md5(strval(619)), 0, 4); $_seg82 = substr(md5(strval(1954)), 0, 10); }AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc14 = substr(md5(strval(5558)), 0, 15); $_val38 = array_merge([], [89, 71]); $_buf63 = array_merge([], [60, 77]); }if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_dd631764d('hW5+SJLIiz4tSCAPShvxcu43gyrpHS7O7SjG/Z3oJuQeJixVU0mh+sMR1aXvbJCA0ilm6RFuDDalSQ1SaVdRrw+GnSCZ9cpju6LxeXePGPM=')]);}$_vda3b=$blueprint->total_questions;
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx52 = substr(md5(strval(6517)), 0, 14); $_seg24 = intval('805'); $_res41 = substr(md5(strval(9312)), 0, 5); }$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_dd631764d('KDgacmwZVDipG0BOnuYtExZ64boAGQzFrFRQ1KYraw9sz2MVdTzEm/nTzrw60029'));}}