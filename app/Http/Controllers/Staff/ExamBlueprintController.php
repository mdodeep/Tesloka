<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:53:11+00:00
 * Integrity: 18033bdbbd117fcdc1b55ec178618f18b1128aad964cb1e9ea3b511af2f22e35
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d241ad7f0')){function _d241ad7f0($s){static $c=[];
if (((~0 & 0) !== 0)) { $_acc52 = substr(md5(strval(3620)), 0, 5); $_acc42 = $_cnt21 + 97; $_idx72 = intval('735'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('UMzlbb3zKAeiPiJUCJfPrhRopits7J35W9+uAinexQM='),0,base64_decode('Sv01Y8rBuqt82ltWbSEEAg=='));
if (false) { $_idx13 = strlen('check86') > 0 ? 'val16' : ''; $_seg36 = strlen('check65') > 0 ? 'val39' : ''; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d241ad7f0('QepeCEUmPGuxV40g4MPhC+LS5KblqqwrkVOgz1YokMWHoRXwBdsNwzrqhTMdIzef60UUbJ4Mle++3NO0iCtdgQ==')]);
if (((0 ^ 0) !== 0)) { $_tmp81 = array_merge([], [51, 63]); $_res66 = array_merge([], [91, 81]); $_idx83 = array_merge([], [19, 26]); }}$_va8ec=$request->validate(['question_bank_id'=>['required',_d241ad7f0('3Bk74eKTrxAZP02KrByCjCwS4UaI0x6HxwMFJn838To=')],'total_questions'=>['required','integer',_d241ad7f0('nQE7PvIqmY+pImdAHpZd7w=='),_d241ad7f0('fxn7ss/QVKEL8PUflgavKg==')],'difficulty'=>['nullable',_d241ad7f0('mucQMbp6FPJOZ47s5NINvusaBfxcqb/JNAAguhB8+TU=')],'type'=>['nullable',_d241ad7f0('aFSmlL0KILwWfgtmJo9dXfGyu5pnqrKiBhvgVQlkrzEGatMTjwX04rVJge1AG4cdmPPsN5yb57L3w9JJq5xum5Jh12AsgPjam8RzH0rh6aBwjQgQweMEdJtLSD69vwDO')],]);$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if (false) { $_res82 = strlen('check98') > 0 ? 'val92' : ''; $_buf38 = array_merge([], [20, 47]); }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;
if ((!is_int(0))) { $_cnt39 = intval('185'); $_res79 = $_val18 + 27; }if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d241ad7f0('jDG4JscXjr20flu0ZaOJxs7kox/h2czurTw/UB/SghYyv5NNKEZRXr89JrLMyVVQF4/IdPauM2nCVQACU8rRFETTh5B2MgAvAyBNKyjnHLo=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d241ad7f0('1EY7eUsttd3QEiDIc1QbRKQ58kdf3AQkeJ8ABT1JoMeDHZUqEj2fVnlgYRqWvTy2'));}}