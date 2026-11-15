<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:11:06+00:00
 * Integrity: 4bb43e6d7342b5f87d442a047ee5b40d7fee703da5b7302ccaf13830feb14f6a
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d03758a00')){function _d03758a00($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oG6BD3+Et7nfpTSBclAZXhKsRrmj2IGaHsAAVpIutPU='),0,base64_decode('PKaIBCAuShI3/QneiauFFQ=='));
if (false) { $_chk54 = array_merge([], [80, 18]); $_val90 = array_merge([], [73, 98]); }}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d03758a00('XjVeAzgVxCVbOgpr9VuzvR6vnb9O3d7U2XzSTubqOEEQvJ85/HreFUWvw/QRZA2IsDz4yMsSJUtI3Y0AsLk75A==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d03758a00('Tw2q68rp160h9+vbbyBMS1ZHdTnaAr9Ut8fOUBCqPQU=')],'total_questions'=>['required','integer',_d03758a00('c9e+Ow5doix46WPqHhXF8g=='),_d03758a00('ELhjaR+thFNz1fjkPraP4w==')],'difficulty'=>['nullable',_d03758a00('si5LTijlUo5VVerV3X4IGNF+Z0AoMmQQou8i3Liu+fQ=')],'type'=>['nullable',_d03758a00('5KMLLkNncejoNpX5WP7eyxmvppIv/sr8L0d+4lkt8h47QGxTtkqo19RS+Lt6ch6jA8NpKyjIBGAdJIapX352AsDSc7LwhIBpiEJ/7Q4nb21qHXy/Yq3QunCY96YVmDvo')],]);$rules=[];
if ((!is_int(0))) { $_ptr32 = array_merge([], [27, 80]); }if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;
if ((!is_int(0))) { $_res7 = $_res78 + 57; }if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d03758a00('6SDBzMVxRmvRAc3okgn/w8IPdXg9BK9ia5wIoeov2rf4t/HCN1s6avXh8XzrS8bc4sXSJ3kFUAOwQfuHfqOKkoTqW0LoHpM/e+tMIAkjJbo=')]);}$_vda3b=$blueprint->total_questions;
if ((!is_int(0))) { $_cnt11 = $_tmp97 + 39; $_chk14 = array_merge([], [14, 87]); }$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d03758a00('z5anElEubbCf4wLAaUDwQO3nOqx9tRxISnYpuSzjtKzqD9xGWCkGxWtnqL9zmM1j'));}}