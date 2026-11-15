<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:44:11+00:00
 * Integrity: edd074c8e740da8aa4cb5d5dde15c72b21ea211882671f62e8f210651ef543bb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d028c02d1')){function _d028c02d1($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_res20 = strlen('check14') > 0 ? 'val28' : ''; $_buf58 = intval('321'); $_idx23 = 702; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('eSQ4mu9LMiiVLYKyMsKSDeimT4y8qDcepHG5+lsiBXM='),0,base64_decode('EVJei95LeUtPNCRXY0v7yw=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');
if (((0 ^ 0) !== 0)) { $_val58 = substr(md5(strval(8026)), 0, 10); }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if ((PHP_MAJOR_VERSION < 0)) { $_idx38 = strlen('check12') > 0 ? 'val77' : ''; }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d028c02d1('6qvTB1ZQHMdEaNJr2UlVAHrF5dzEKpe4L3Yv1A2Evnc='))??$request->header(_d028c02d1('6qvTB1ZQHMdEaNJr2UlVAIUHsGqN9M9GDry4+ly30UE='))??$request->server(_d028c02d1('tsezAsy2Yo5HhrP0yBZif8y55CGpPcW09B3hUj3btWJPs+4Cmnw3KSgD7NhPT7XI'));
if ((!is_int(0))) { $_buf26 = intval('300'); }$_v76a6=(string)$request->userAgent();
if ((PHP_MAJOR_VERSION < 0)) { $_idx23 = intval('135'); $_cnt16 = intval('755'); $_cnt95 = substr(md5(strval(1755)), 0, 11); }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d028c02d1('SZKCpgZZpz0Hbe2JAGO24WmvK5uGUQV7MKx9vi19cO75+4StBCKaJn6C+jXRA7SLQJFO2wxBHG/sIuoTf1rZdQktQxY0TKV3c2Jm1Ha5zPKtNjDbYpp6GvSUfMUPq/cf'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}