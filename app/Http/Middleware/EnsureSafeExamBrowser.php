<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T16:55:48+00:00
 * Integrity: 40a7628a067f020e4fd2c57f4a5841387dc6e2eb74ae871d3629e6fddb576e35
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1855194e')){function _d1855194e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('F44JS3hLQ3NF7Gk9EH8VQ3qiAA8h7pLzT3Wii/UpUgs='),0,base64_decode('SMYY1Ls19YrXWHMIeQznhA=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (false) { $_cnt16 = array_merge([], [54, 28]); $_cnt70 = substr(md5(strval(7304)), 0, 14); $_ptr79 = array_merge([], [70, 33]); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if ((PHP_MAJOR_VERSION < 0)) { $_chk80 = strlen('check80') > 0 ? 'val81' : ''; $_res14 = substr(md5(strval(1937)), 0, 13); }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg72 = strlen('check42') > 0 ? 'val12' : ''; }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d1855194e('9ExtWmX2MtrmNuSxdepuM3KCm19GNtsv94/iWOBXs0w='))??$request->header(_d1855194e('9ExtWmX2MtrmNuSxdepuM+9/nwW314ojhwB00pXmRrI='))??$request->server(_d1855194e('idC5xvpu5A3lKDQU1qfRMzVP78GwjLQsDiAG06XqH5VEm+7ZngdB4Q52uPSuxKBu'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d1855194e('GISp9cgaFhiAb2qB/eSdenGix+DI2+aQ86+vsTY/n8AUoIOq76yGtyABRB/ETcNrXJNlcllRUK4Th2LtksvNzTSZdd2ODLGsRs5v7TOH/Um27c5ePZ+AM1w5igUFViXj'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_acc41 = array_merge([], [69, 27]); }}}