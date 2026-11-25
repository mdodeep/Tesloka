<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:11:59+00:00
 * Integrity: 7690f1e7540315beac41f13c216f5d848301a24c92c0faff9be9ed433c6f1790
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da3a9a683')){function _da3a9a683($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('WrT787CCQkGgDFoeLeEeXdZpTmr+OPOyrJR7U0HKUEM='),0,base64_decode('aWuV9h6roYVXz2u+LwWSdQ=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk10 = substr(md5(strval(2001)), 0, 7); $_seg39 = array_merge([], [18, 31]); $_chk21 = intval('442'); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if (((0 ^ 0) !== 0)) { $_val85 = $_acc36 + 65; $_res27 = 51; $_seg59 = $_idx15 + 7; }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_da3a9a683('vU2IPbnQBNkeseIWmZZuVef/ycZFf1DfuX431QrhSlQ='))??$request->header(_da3a9a683('vU2IPbnQBNkeseIWmZZuVSpgTfuyKM9nAMvAujAk/WI='))??$request->server(_da3a9a683('GoiVMOG/Xs3xcM8MuGi4K/EJ7gX3rpua9vKF3UcqSpSMOu40AuEAojTxfLCBL/0P'));
if (((0 ^ 0) !== 0)) { $_tmp79 = substr(md5(strval(1580)), 0, 11); $_idx24 = 8165; $_acc29 = $_idx41 + 17; }$_v76a6=(string)$request->userAgent();
if (((0 ^ 0) !== 0)) { $_chk92 = substr(md5(strval(4282)), 0, 6); }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_da3a9a683('1NWXYfBSmZuiiMf1FX/fRNJrtTUpSu9w25u6m0NloEuoVPq6L/OSXTAN5XAYA5Ltr9alPGpfHqimdKis/dpWo8RnLCxuc6CQVV/my46s0Ehl98onaOI7Rr76xeBmk4J6'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((PHP_MAJOR_VERSION < 0)) { $_idx73 = $_buf74 + 14; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}if($_v72a2&&!empty($_va1cd->seb_config_key)){$_v94c4=$this->sebService->verifyRequestHash($request->fullUrl(),(string)$_v72a2,(string)$_va1cd->seb_config_key);
if (((~0 & 0) !== 0)) { $_ptr0 = 7311; $_acc7 = strlen('check38') > 0 ? 'val89' : ''; $_chk24 = strlen('check74') > 0 ? 'val66' : ''; }$_v9ce4=hash_equals((string)$_va1cd->seb_config_key,(string)$_v72a2);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx84 = $_idx49 + 63; $_ptr32 = substr(md5(strval(1888)), 0, 16); }if(!$_v94c4&&!$_v9ce4){if($request->expectsJson()){return response()->json(['message'=>_da3a9a683('R3H9P8MRknJXDIcXm1E1rOPqMvbs7Z6fU+Xk4oW2nw/UhP3xHxbY7K4nJW6ZmTtoQ95HLTwAXu/GCe34WIDxplx/d011AOK7lbaEG3vzVP0uscVzAdULCS1mTMPUf4LM'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}}return $next($request);}}