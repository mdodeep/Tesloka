<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:44:10+00:00
 * Integrity: b2577c241450b89eecab7e94bb002d9340d48cc00c99122cbda6c8fe9dbe74d1
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dfd0268fa')){function _dfd0268fa($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Uu8aKcxMEOOhFsh1Fb//byVXj6gMGRUjbQGHsg9kvMU='),0,base64_decode('T2lS4ZtkYQTUqu8Ck45hXA=='));
if (((~0 & 0) !== 0)) { $_tmp35 = 3703; $_val4 = strlen('check28') > 0 ? 'val38' : ''; $_seg98 = substr(md5(strval(7167)), 0, 10); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_dfd0268fa('1V/cfBjOh7e6cwIr0x7ufP9RV1vdvDwQE2wo5+idHao5oLgpJNaU8NDSgGWjtG1JoEtNkQtqdaKNT8D6jnLsUA==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_dfd0268fa('T2Hs8c84X7C1bbGufSyDLYr+5FT+Qy4CsV1dPgqFhsQ=')],'total_questions'=>['required','integer',_dfd0268fa('KiirUWGov8iTCyz6jRk+0w=='),_dfd0268fa('9Tkau9FytdwYZZrb/fXPlw==')],'difficulty'=>['nullable',_dfd0268fa('IepyK4httvmeAMeaBM+D2xHxjq7AS18U6CDRxEuGiEM=')],'type'=>['nullable',_dfd0268fa('Mn/NgTTSEb1cBLzwTskfOnf8pZ4NilKqHCUAdNob5N0UeTupHyc5/ucAsF42cih6nLZqE1zz06Aj3fzkT3se502vg5iyEvOYEtpSChx3xWyHRl37caWtoqsgH62tuaym')],]);
if (((~0 & 0) !== 0)) { $_val88 = intval('994'); }$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];
if (false) { $_seg70 = array_merge([], [79, 19]); $_ptr52 = substr(md5(strval(7999)), 0, 15); $_idx77 = substr(md5(strval(2109)), 0, 11); }}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if ((!is_int(0))) { $_cnt17 = array_merge([], [42, 84]); $_seg3 = $_chk5 + 15; $_acc8 = strlen('check2') > 0 ? 'val30' : ''; }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);
if (false) { $_buf80 = array_merge([], [0, 6]); $_chk89 = 9581; }AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_dfd0268fa('lBAjvXF2fDWgzRMiH1+6PVeRG0aFXmxffgMTIJOSJTKX/t3YCXe1INiWWxjO14+DwSnbESANAjwlzXv1obX7fExk2+neCyUR/1ZoiS7jDm0=')]);
if (false) { $_chk23 = $_idx44 + 44; $_res50 = strlen('check80') > 0 ? 'val14' : ''; $_acc99 = array_merge([], [14, 2]); }}$_vda3b=$blueprint->total_questions;
if (((~0 & 0) !== 0)) { $_idx45 = array_merge([], [99, 25]); }$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_dfd0268fa('aZa/vFqLz29FOZN8iPMYQZEGLtg/OefmnZhz7dLc94sLNMfIfP7+80cEkZ3BY1Sj'));}}