<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T06:08:58+00:00
 * Integrity: 8384463dddc064494029a13ae13deeb38b3b1a8d2fdd64ae5d37d2ca9dba32c0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d0974686b')){function _d0974686b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('SB6iCzDa8A1AYRIj4vpj8YEPGwVCzV2mzmdbrasnJq8='),0,base64_decode('LIF3QxeFrr+Ptdh7E90xpg=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d0974686b('YJ+hr+y+RLL8qqWKCaG9z6DK364Jg/6wvFymhDTD/7sLOEbozWNGi7kpfEoghITvl8uJpidla3JDF8ayThl6OQ==')]);
if (false) { $_cnt50 = substr(md5(strval(1081)), 0, 9); $_val88 = substr(md5(strval(1216)), 0, 11); }}$_va8ec=$request->validate(['question_bank_id'=>['required',_d0974686b('do8wjqJz+tG0izlVx7wXDvdZ5l9GaDIMk3WhQn4ByKc=')],'total_questions'=>['required','integer',_d0974686b('y9WSA6SVpSz38naeselAfg=='),_d0974686b('LdGDcB/xJR1zrZGdjfBtVg==')],'difficulty'=>['nullable',_d0974686b('oebtlNeyV1qXv9ygIHSi0MTEdv4cUZt+AjuGuoGn5Tg=')],'type'=>['nullable',_d0974686b('Rz/vRVJuIqm2Tuw8+OzGHoZvQMlY/zJt/0SjzjWeMvjAB2fdobbixI5um4MiHyp37xCBNJCKJEfB45lonx+9c0r1eVMp8kyiVCTnAzXE8hwCwol61a0QGkRw6rGu+flc')],]);$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];
if ((PHP_MAJOR_VERSION < 0)) { $_ptr21 = intval('153'); $_idx85 = $_tmp97 + 52; $_buf21 = strlen('check98') > 0 ? 'val16' : ''; }}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d0974686b('5s7obYxpSo2eo5CUvQzQoFhg8MiBU6dQDFIJ48f6aLAL6bVUYwgS4BcwG7nlO0ZFDVULgn+/sCGDx4MpBX1OOda4NWSYOwIQr19GxYcIsJw=')]);}$_vda3b=$blueprint->total_questions;
if (((0 ^ 0) !== 0)) { $_res43 = intval('190'); }$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d0974686b('n8KhzqUgaP7XX8Z04f2S69+6qcl5OEkFnHemKhQw1B+lLV8+YfbbzgFVLxqflU0N'));}}