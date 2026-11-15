<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:28:09+00:00
 * Integrity: cece1f09a4c104ca687cd4df334946077335ee48ea708f4c43c98fb7ad43a1fa
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d96078fa2')){function _d96078fa2($s){static $c=[];
if ((!is_int(0))) { $_buf45 = 7811; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kvcL6naaYq6o6wGRJrZdGyuV6FMyuiFX00HAf1lpXVg='),0,base64_decode('ZRzFayU4e2F5+vVnyqG5ww=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');
if (false) { $_ptr68 = 1797; }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (((0 ^ 0) !== 0)) { $_idx12 = $_idx15 + 36; $_cnt88 = 9819; }}$_v72a2=$request->header(_d96078fa2('hitH7Y0dy0E4zU0fI1p5IFxsI9DqtAu19hWGInEy/K8='))??$request->header(_d96078fa2('hitH7Y0dy0E4zU0fI1p5IJp/h8LTAP6scX8HGm2P+QU='))??$request->server(_d96078fa2('qXn3zTsL4UBHkpr60nihJ1OUYpzGVU05kpUExLxI4jLahCbAV3CfENQ98Cm10i0B'));
if ((PHP_MAJOR_VERSION < 0)) { $_val61 = substr(md5(strval(9398)), 0, 5); $_seg17 = array_merge([], [90, 28]); $_idx2 = 7168; }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d96078fa2('M0KKBpwEIEbf4CX87IS7usxJeZdee/+rl6/a2jmURbQ8Kl4C5AZiUHiJCsyYGDLeA24gRFKQg1htws+/cpNxg4F/7YK3yIXOCccDesgm0AS0Eyt3SVBmNm0B+zuhcIZX'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}