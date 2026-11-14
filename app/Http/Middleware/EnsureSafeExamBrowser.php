<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:24:08+00:00
 * Integrity: d265ea50dc5bbc689fa520fd4333b1bc1a3d5e6acda2777d1c9a7eca14bc6d59
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd4fa60bc')){function _dd4fa60bc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('htnbFA6KqdFt/CeJvk1BT3ALVp/a1pMq43OvjL3HQJw='),0,base64_decode('h8sxtk8/DjpyyeDs+99Wxw=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (((0 ^ 0) !== 0)) { $_tmp64 = 9486; $_acc56 = $_idx27 + 19; }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if (false) { $_acc95 = $_idx66 + 92; }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if (false) { $_acc63 = array_merge([], [94, 33]); $_buf16 = 4198; $_res85 = array_merge([], [7, 65]); }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_dd4fa60bc('SB0ETf1p+ndXwL31o0xLd+/gFanB6GOycWOTwsKGkRE='))??$request->header(_dd4fa60bc('SB0ETf1p+ndXwL31o0xLd79sohv54M9Gbq8riY5wPZk='))??$request->server(_dd4fa60bc('e7K6pSifjNeCE++MhgPzcm55afT5+1j0Vmdp14lUbgaqNjaiUqqK6zCbgf4lsgYF'));
if (((0 ^ 0) !== 0)) { $_tmp17 = $_buf6 + 84; }$_v76a6=(string)$request->userAgent();
if ((!is_int(0))) { $_val76 = 2852; $_val40 = intval('188'); }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_dd4fa60bc('xBnl2dx3euDeNMrv0X/J43nqjgzcqoSV0Nvdi4EFAOIN32+gNEQUUM7LZQHS+co4sDQrkjciaOAW+X5FIT2ALkxfWB8c62JMy5u/Jd61UwmjqRgvDYRa0VEE/OmaL0rv'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((!is_int(0))) { $_cnt58 = strlen('check32') > 0 ? 'val98' : ''; }}return $next($request);}}