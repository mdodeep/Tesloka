<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:25:42+00:00
 * Integrity: bdf411897d6e92d2c062c00df8c8159ae397421da420a7f909e77fb6460130be
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc55c918a')){function _dc55c918a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LDrpEoVyTpm5Sm/kXKCWthZegXtwO9ga3OjzUwaozOw='),0,base64_decode('zNVVPub/VyrPlN9jA1/3IA=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if (false) { $_buf38 = intval('224'); $_tmp7 = intval('61'); $_ptr4 = $_tmp83 + 60; }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_dc55c918a('zJulrk+7Xl5BChcbULvMeOxJLSiwonpPghZShC8ZAXo='))??$request->header(_dc55c918a('zJulrk+7Xl5BChcbULvMeBevaX0awEig8qG2rkKtNr8='))??$request->server(_dc55c918a('vUWymY2KCIFpqXmPJkp6fVmYm9IM9uvd97Fc6fJYKAzAnSOqBbcTTqLfctWWrd+I'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if ((PHP_MAJOR_VERSION < 0)) { $_tmp65 = array_merge([], [27, 78]); $_val12 = intval('489'); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_dc55c918a('u0Gah7vJUzefQ2U7MSb0KQPHnspseIbKOP02Wn8U78Nd+7/6I9xurqUEdZ/Rp0qgusFgxa/Evnl0RjVi/SeNnhJHX6GVzWjbKGudd4pU6rbG28iXyYV5+4bSfR1IpFKZ'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}