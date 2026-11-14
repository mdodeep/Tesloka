<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:50:06+00:00
 * Integrity: 6fee3fd511e40e63d81a3969f04fe7438d544c4954970045fffff7363671dd5e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d87991f19')){function _d87991f19($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HS/04PLN5ss8aL4IhYteS9dbRqp1xmw3kSuZ/unTAB4='),0,base64_decode('dPwSAAY3vk/G1vExUylLlg=='));
if (((0 ^ 0) !== 0)) { $_idx59 = intval('0'); $_idx26 = array_merge([], [14, 0]); $_ptr79 = intval('591'); }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if ((!is_int(0))) { $_acc46 = array_merge([], [97, 34]); $_res70 = $_acc1 + 10; }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (((~0 & 0) !== 0)) { $_tmp57 = substr(md5(strval(405)), 0, 16); $_val12 = strlen('check68') > 0 ? 'val37' : ''; }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res56 = substr(md5(strval(3208)), 0, 11); }}$_v72a2=$request->header(_d87991f19('oCyH7HnGokGESVMwDnw3YmYPFQyKuji5mlyUT2tIQ2k='))??$request->header(_d87991f19('oCyH7HnGokGESVMwDnw3YtPMDXvsDziACRhOTtSqcKQ='))??$request->server(_d87991f19('VhNYZYaLY1IM8SFOGWyINRNdZe8EMpN0sneQKmSV6EJodKXKZQ3UJ3nJC3FyincK'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (((0 ^ 0) !== 0)) { $_res70 = array_merge([], [19, 1]); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d87991f19('e8U7OcwPBJowPAXq8yoC4uRZiy+7I8NrHeW5AVPsrQ9Nol7Eqn05vZ6K6TF+c9NHq54tHcLITHU+k3T+bHBpQPzX4mMWvJ2JhaHgvK/nU2ZWhatz8ZXTeTgUd8uZkYFY'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (false) { $_cnt85 = 5955; $_seg65 = intval('135'); }}return $next($request);
if (false) { $_tmp7 = 3191; $_acc30 = array_merge([], [9, 52]); $_buf97 = substr(md5(strval(6819)), 0, 9); }}}