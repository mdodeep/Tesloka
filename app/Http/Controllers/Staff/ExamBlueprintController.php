<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T03:52:05+00:00
 * Integrity: d3638726e9f78ca54b5961d6f09ea75b73a24fcc350e33faa5859d80a3ad41dd
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d613b51b4')){function _d613b51b4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KVSd93tXKM3gTctZT8lRWfd5PkchBNKNlWufqZrTVzk='),0,base64_decode('zKuCDNj55PIZ6pU96I4JlQ=='));
if (((0 ^ 0) !== 0)) { $_chk44 = intval('810'); $_res86 = 9645; }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d613b51b4('3wMzYKDKEmkT7OOsfiIbf6S0Slql8lHPRS2aWJbjVgzjV3vOsTgSw9zAJ2y80/DK0CqV495gXKOMUA9iAbn2YQ==')]);
if ((!is_int(0))) { $_res51 = strlen('check14') > 0 ? 'val76' : ''; }}$_va8ec=$request->validate(['question_bank_id'=>['required',_d613b51b4('DBEM7ppXJHwSpqxhghku5wYFe9w2Sh/zMivDfG8ks9Q=')],'total_questions'=>['required','integer',_d613b51b4('fD6bEGSrdxLTWaZR0tTjUw=='),_d613b51b4('w53QVGH4weLJMUklQvu7sw==')],'difficulty'=>['nullable',_d613b51b4('get6439Id3JCbXn3eikjCSbcdXz8WD6UbxUJUYUb6mo=')],'type'=>['nullable',_d613b51b4('OLozQdRDBsV27zL0qoLzxtCa/omKWkIqi/MkdnbxqlC2/9XQMNQxfHaDhpCP7mbsrla9FTr4oPChKokltR7KJeNhn9dJ9X9oo+QpC9PPRw3TaGXP1OY2yaWf/jsIOCV6')],]);
if ((!is_int(0))) { $_cnt17 = 7575; }$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if ((!is_int(0))) { $_ptr90 = strlen('check32') > 0 ? 'val29' : ''; $_idx64 = substr(md5(strval(5578)), 0, 15); $_cnt85 = $_tmp19 + 52; }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;
if (((0 ^ 0) !== 0)) { $_acc44 = substr(md5(strval(4052)), 0, 6); $_cnt88 = array_merge([], [10, 50]); }if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d613b51b4('F1lyv4aGDRk8fgpBsyp6smdE1sNNA8h1wOShI9e18FwuKMXAbe6fJCri6SU0EjTdtv7MhFCXpM5A3z1yQrG86z3OBy4FZfg6NLLwD2wEUug=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d613b51b4('3swqDbGx9fhfPBXhPa3jUBMdCJMhRPV1E40uBxLJSIFAef0vLc6ydXMjWrYRN0Zz'));}}