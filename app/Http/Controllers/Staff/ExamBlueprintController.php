<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T16:55:47+00:00
 * Integrity: 4e03203625f65de220db0585dfc37c14de7b4b0038c8802e7fc09d706767c565
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d9a1bb952')){function _d9a1bb952($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1gtUf9GlMjDtusYt28G90C5jGAvaw/zHzCdYOyS5UeA='),0,base64_decode('R3bk3GeVpLhcqLO1jWa3Ig=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d9a1bb952('rEM2n7Z9w/8DYFYDPDSEmpv0YRJ27uGFMGEK708ho1WA3qYoW9Br6nHskgdLZQsAVvUY0UHdFV67nuaBg1xdOw==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d9a1bb952('7nBkgIqEF/M/BnUv5dLrdEGmev4TOIUC1sWlB6ENKg4=')],'total_questions'=>['required','integer',_d9a1bb952('BVGRuIZkW/vnrKS6hxFZ2w=='),_d9a1bb952('FDjd6JcMBxL26FptbZuPxg==')],'difficulty'=>['nullable',_d9a1bb952('n8RpoW9VMZWl9N21xTb1fTZJAOVJ2rlwdYmzoN3FBkU=')],'type'=>['nullable',_d9a1bb952('/AfHCwWXUdspjj/gFf+jXSvlC23LJ50g4hyODPw0n1KHdvC540Gf9cljbyn8E4R6Me5oj4Us6sEt6nmfK/NBaVWScuXXIsJpDk85RTkAukB56zG+CEQ5CdYsU3cK1WtW')],]);$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if (((~0 & 0) !== 0)) { $_res10 = substr(md5(strval(793)), 0, 7); }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);
if (((0 ^ 0) !== 0)) { $_idx56 = 4549; $_val38 = array_merge([], [84, 31]); }AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d9a1bb952('t6ZjJQ6bMg/6XlrKvYfRixVngkSnIUxcpCwv6NhU+mc5yNz0Zj4IRbhFakL+yu+100Fd136P7CSLV6HDwNODG14zzuAYVstSlG3krbyVEBc=')]);}$_vda3b=$blueprint->total_questions;$blueprint->delete();
if (((~0 & 0) !== 0)) { $_chk5 = 9770; $_cnt88 = $_idx20 + 39; $_chk83 = intval('531'); }AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d9a1bb952('0BvKrT3W4HXqTiCpoFbheEGHVE3VwymsEDcfGCPs6sRbeacVKm9oW6m/xzaxQdM0'));}}