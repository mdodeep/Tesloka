<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:46:25+00:00
 * Integrity: 5dc076367dca2aca8216f163718bf09dc1ac6d174d5e80534a1715a9a20a58f6
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1fddd8f1')){function _d1fddd8f1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JmAvWETrNjxbvU0VdJo8sWmZzJ6H0uQrGJ3T/4rCopU='),0,base64_decode('gy7yr3IHw8LJ7fQVt4RZyg=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if (((~0 & 0) !== 0)) { $_chk90 = substr(md5(strval(8540)), 0, 11); $_ptr49 = substr(md5(strval(5330)), 0, 10); $_cnt39 = $_cnt44 + 36; }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (false) { $_buf12 = 4879; $_idx2 = substr(md5(strval(1888)), 0, 10); $_buf88 = 9517; }}$_v72a2=$request->header(_d1fddd8f1('SUeDSdQrG7IPFi174dQTE4S1dWbzbOxNm248Zp/9094='))??$request->header(_d1fddd8f1('SUeDSdQrG7IPFi174dQTE1J5n+Oarqhmt4hiUL1Wazw='))??$request->server(_d1fddd8f1('GlENrtaNtnw4V5isFW5Fg2flv6vBbjg8NJrzONr/CGEdROUnRusnQkALGzL39N+V'));
if (((~0 & 0) !== 0)) { $_val33 = 1838; $_cnt94 = $_ptr4 + 64; }$_v76a6=(string)$request->userAgent();
if ((PHP_MAJOR_VERSION < 0)) { $_acc16 = array_merge([], [10, 9]); }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d1fddd8f1('L4UPUA6O3u+AOiPLFGOsfXIW5AAqi3jwVFm38ZCQ+iwqJP4pZK4qYX8CQsmnmccUcPa+N5589KMZ8k90/SaMpeUUOEdELQ/XUy7GV8tZI+xOgmxifraaO2FGVGbjX1Fu'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}