<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:38:08+00:00
 * Integrity: ad54f1c25c6fac3670f58e97a01936f39c1c2b344632a5dac0494ee60ef9dcaa
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dcd290691')){function _dcd290691($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EjMlom1ufjxQiPzzw8/aMLJAZrfjKbZ4eFbLjvJMZBs='),0,base64_decode('mVwXjO98BLyZ13P5ek28ww=='));
if (((0 ^ 0) !== 0)) { $_chk16 = array_merge([], [45, 83]); $_tmp37 = substr(md5(strval(1079)), 0, 12); $_chk24 = array_merge([], [39, 15]); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_dcd290691('tt/r3G6k2eXGxpBAPqC/PB3FKcMkf1fUIB8zQUnAQd6vP9ld3/DnKsevErbaY3i2g9/yMAm9twaCkJqFhAyh4A==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_dcd290691('V5eMbPBWoDsNeoCq32bX7XXQpjQ9NRb+ufO7Wrtli0Y=')],'total_questions'=>['required','integer',_dcd290691('yzmouAORJu8z+uWH6akxsg=='),_dcd290691('5dmm/YzOkkRwc6KWQ9WDtg==')],'difficulty'=>['nullable',_dcd290691('j1PpZ59I3sxPVHpXsZJylj4/lkZThhCMiwurkt7GppU=')],'type'=>['nullable',_dcd290691('Eym3BvdNQ37q/7Ch4D9hKlHQLrA8IUmnBGUjmSXKM8i7WjRfaUAM9yVQPlCQMugUoOiOs7d0XG2DEnbsye/I11nnWjofcWPccD3FPcT/VhbrwxmmgKhBKZ3GHWhdvGWa')],]);$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;
if (false) { $_buf55 = substr(md5(strval(7715)), 0, 16); }if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_dcd290691('3KZHVWoPORBOT9kQ1TieOWkmcV3BeIZLIGawQpPsfJzMKPyPkeDlM9qlAnl1lW0auDrfGx9IxyNt3r1CKpTXeU6Vd246zU+XVW+1sKUM6DI=')]);}$_vda3b=$blueprint->total_questions;
if ((PHP_MAJOR_VERSION < 0)) { $_tmp79 = array_merge([], [84, 19]); }$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_dcd290691('Zt8lAuYqnKD6JkXtnKvvum1vL4PFH0jL5J3JqfOtQrNbZjJ/dZYQhjur9q6f/k2i'));}}