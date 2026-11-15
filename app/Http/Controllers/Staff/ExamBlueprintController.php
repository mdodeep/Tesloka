<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:33:36+00:00
 * Integrity: 074f9f57e386c0fb439ea72e8b3c050b81e2c948c6e3c0349aba811f6b60ed9b
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d5b8b2f01')){function _d5b8b2f01($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('YKSqdpFEDFal4Di5zEeE2Kr2f0szzjR8YWIC3DVkWxo='),0,base64_decode('UwP79ZycSMfVxP3eBii5gA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\Exam;use App\Models\ExamBlueprint;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;class ExamBlueprintController extends Controller{public function store(Request $request,Exam $exam):RedirectResponse{if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d5b8b2f01('rUfhEJay7s+xSxjvaZR1SREtJ6dlohMHaRBAjp9Kn5lSKEAVtBXqNIHoz2bzwC74CcmvQ0IRgLgYu1FcKrW0AQ==')]);}$_va8ec=$request->validate(['question_bank_id'=>['required',_d5b8b2f01('le2p0LhByFgc3qh0wR7ped/gF/QWicf/hJH4WCYKEEg=')],'total_questions'=>['required','integer',_d5b8b2f01('jZH859LyJSDs/fGSlbghgg=='),_d5b8b2f01('293UdItbg23AB5DzVEOP1w==')],'difficulty'=>['nullable',_d5b8b2f01('Kjuu83e33+l0ZeVIMRww4sWShZLZc/HX667YuY/l558=')],'type'=>['nullable',_d5b8b2f01('Xd/E+nqFCvko92UWK7k6RkUXeB9o5qK21Ij+OJcvWPmZ1vMLfJMxtnJODd/MADXRQAeDuCSSOWiy+E1+4nGzX6TG/3B/+SbxZXl8zRutFAhwRRDFYsCoWfUvueMlRWM+')],]);$rules=[];if(!empty($_va8ec['difficulty'])){$rules['difficulty']=$_va8ec['difficulty'];}if(!empty($_va8ec['type'])){$rules['type']=$_va8ec['type'];}$blueprint=$exam->blueprints()->create(['question_bank_id'=>$_va8ec['question_bank_id'],'rules'=>$rules,'total_questions'=>$_va8ec['total_questions'],]);
if (((~0 & 0) !== 0)) { $_chk39 = $_chk44 + 35; }AuditLog::record('exam.blueprint_added',$exam,null,$_va8ec,"Cetak biru ({$_va8ec['total_questions']} butir) ditambahkan ke ujian {$exam->code}");return back()->with('success',"Cetak biru ({$_va8ec['total_questions']} butir soal) berhasil ditambahkan.");}public function destroy(ExamBlueprint $blueprint):RedirectResponse{$exam=$blueprint->exam;
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk94 = intval('202'); $_val96 = substr(md5(strval(6255)), 0, 11); }if(!in_array($exam->status,['draft','pending_approval'])){return back()->withErrors(['error'=>_d5b8b2f01('ga1hJwiSsKL/rwqBnzGF4+Kpky0JQND6yVSE32cDtp5BPxYksuecSVJ1d9SXGMCygBZHjiCVHf7zdnZTl4h5fxTUZqiPdxXBDoMZencXymo=')]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res19 = 1101; $_val90 = $_val8 + 36; }}$_vda3b=$blueprint->total_questions;
if (((0 ^ 0) !== 0)) { $_val0 = intval('966'); }$blueprint->delete();AuditLog::record('exam.blueprint_deleted',$exam,null,['deleted_blueprint_id'=>$blueprint->id],"Cetak biru ({$_vda3b} butir) dihapus dari ujian {$exam->code}");return back()->with('success',_d5b8b2f01('BDTo9IiEyVlPpTtPrrO62xvDyaiBbjbRyoyKU5YHUjOccAIEu/Lk0OqAYcfqp92G'));}}