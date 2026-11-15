<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:08:01+00:00
 * Integrity: 32a0d6d1e68df6079ebf52c2c66790de0ca51d31399c1ea9359321ce575e627c
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da67ec5bb')){function _da67ec5bb($s){static $c=[];
if ((!is_int(0))) { $_res39 = $_tmp19 + 68; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('BDgQS1NrdPOa4aJWSKzM29uLNGnfkfHw2yRQNVDdfjU='),0,base64_decode('3DGh6NmxMPqFH5bNyq00Kg=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Models\QuestionBank;use App\Models\QuestionStimulus;use App\Services\ImageCompressionService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;class QuestionStimulusController extends Controller{public function store(Request $request,QuestionBank $questionBank):RedirectResponse{$_va8ec=$request->validate(['title'=>['required','string',_da67ec5bb('bHmTYSA8U3ytH4kUTldR/w==')],'content'=>['required','string'],'media'=>['nullable','file',_da67ec5bb('sfPX52RdkOGcCE/XZTCEVWpA5AY9nGhkyYCWUw9q6dmNenuh9otBbHfEM1fmGrWf'),_da67ec5bb('9y5RsCunpsMOtZmW38GZCw==')],]);$_v44f8=null;$_vd761=null;if($request->hasFile('media')){$_v025a=$request->file('media');
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt94 = array_merge([], [23, 60]); $_buf20 = 3437; }$_v6b47=$_v025a->getMimeType();$_vd761=str_starts_with($_v6b47,_da67ec5bb('7fHpn3ceHnUGjDlgeyjtZA=='))?'image':(str_starts_with($_v6b47,_da67ec5bb('QT8fO7NCpd147X0V97ENyA=='))?'audio':(str_starts_with($_v6b47,_da67ec5bb('uNJvnUiZCFipEeEURTX/mg=='))?'video':'document'));if($_vd761==='image'){$_v44f8=app(ImageCompressionService::class)->storeCompressedPublicImage($_v025a,'stimuli',75);} else{$_v44f8=$_v025a->store('stimuli','public');}}$stimulus=QuestionStimulus::create(['question_bank_id'=>$questionBank->id,'title'=>$_va8ec['title'],'content'=>$_va8ec['content'],'media_type'=>$_vd761,'media_path'=>$_v44f8,]);AuditLog::record('question_stimulus.created',$stimulus,null,['title'=>$stimulus->title],"Stimulus baru '{$stimulus->title}' dibuat");return back()->with('success',"Stimulus '{$stimulus->title}' berhasil ditambahkan.");}public function destroy(QuestionStimulus $stimulus):RedirectResponse{$_v5d2b=$stimulus->questionBank;if($stimulus->media_path&&Storage::disk('public')->exists($stimulus->media_path)){Storage::disk('public')->delete($stimulus->media_path);}$stimulus->delete();AuditLog::record('question_stimulus.deleted',null,null,null,_da67ec5bb('AWo61JQtanSgcR5u4Zbwoc4UG37p9TWKN9dlUyFYDTE='));return redirect()->route('staff.question-banks.show',$_v5d2b)->with('success',_da67ec5bb('e+GVJuZzGkA+Y4YRGLbZpC2Wpq/rY5vAVDqCRwpUaW0='));}}