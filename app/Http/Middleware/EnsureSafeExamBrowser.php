<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:23:12+00:00
 * Integrity: 22fe0485658e378b8e3824adbf5f2768e37e3742a2eba6ba81060bb1364b2fab
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d46363df2')){function _d46363df2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('PZ/QVlfoWmdIIPwO8kp2kJQGUBV50cEwXzIRw/004r0='),0,base64_decode('ACqCEVZi9Lh3xxrG5RP0GQ=='));
if (false) { $_buf92 = strlen('check4') > 0 ? 'val59' : ''; $_chk53 = substr(md5(strval(8980)), 0, 9); }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc97 = strlen('check67') > 0 ? 'val29' : ''; $_chk87 = intval('852'); }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if (((0 ^ 0) !== 0)) { $_buf84 = intval('785'); $_buf55 = array_merge([], [42, 90]); }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_idx92 = intval('413'); $_tmp38 = $_buf55 + 32; }}$_v72a2=$request->header(_d46363df2('NmjDyKPkR8X3jbiP6hwztSodpOhZbPVSL9bLo3Au5YA='))??$request->header(_d46363df2('NmjDyKPkR8X3jbiP6hwztY9hQkqy3xaKMm+pF1mxYaE='))??$request->server(_d46363df2('jx5mYtYXEcjdP1AHXujp4hxWBDIiSgTZ2uYXGinV/oSVDZ4eJL2KAUZjvBQaQNsM'));$_v76a6=(string)$request->userAgent();
if (false) { $_tmp56 = 9954; }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d46363df2('hT5nm62AW2UUMSZZzjdv/c7dExYaHSlr8hz7EOEE6r+wDI2xSR1um6wRAjY3XtjqRRZO9IYzc0hbw0NCMx9gi2d28pKvt+atCy6tRTL0C89J+ZKCkTrWvEIO+MFsEsN+'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}