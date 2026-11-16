<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:38:09+00:00
 * Integrity: bc7f5b3c74d51b63901f4967a2adc5558fd3cec333bf300f09ffd1de449a27e9
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d230568bc')){function _d230568bc($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_chk7 = intval('435'); $_tmp6 = intval('555'); $_tmp79 = strlen('check23') > 0 ? 'val82' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Z9q7yeqnR6S8igz52RK/Q5QjobiYCOOKlcZHDG51X0g='),0,base64_decode('QhcE3e/5ShZxDKP7oj69kA=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d230568bc('kDMwv8dEuYAQM7nUPd4o/CUtn+dqVnTgwo7WRNRtCfE='))??$request->header(_d230568bc('kDMwv8dEuYAQM7nUPd4o/DQquZpnWvOUkAZmP+IEDUk='))??$request->server(_d230568bc('D0HisHKkU0lmKmg6y03IkeDWiupaGodTrTlmNNNRbos7UvfqkgWe0nLafIP7cqz8'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d230568bc('RVVYwNcasIwEmcw1ARQsvKCh2q2zGIMETYt9gFNccP8+K1wqVgWJSPYlfr1sjLG8Mh0pVq3dxNSJuz9eD1xvapLCuTVngZLIarkw5E2xftI9kxHsO/690uPBkg5x78HZ'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((!is_int(0))) { $_tmp37 = intval('784'); $_seg68 = substr(md5(strval(2345)), 0, 13); $_res8 = 5575; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}