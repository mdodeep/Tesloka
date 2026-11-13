<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T10:25:08+00:00
 * Integrity: 355d438183c4270a99efdc1299cd916b84883368582d9ba9e9ce8f086bd847f4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d88805c6e')){function _d88805c6e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('gOzCC8rMaTmhiaqlXrG1z9TGAi7DQZqbyFGhWedJlko='),0,base64_decode('hRndao/oqDsd1eLaBdJi1Q=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_res90 = intval('558'); $_cnt24 = intval('494'); }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if ((PHP_MAJOR_VERSION < 0)) { $_buf17 = strlen('check51') > 0 ? 'val61' : ''; $_acc12 = $_seg49 + 54; }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d88805c6e('Y0gGCmQXsiaos44F48J21132y5MYg8QfK21uJV7wefo='))??$request->header(_d88805c6e('Y0gGCmQXsiaos44F48J2193vljxqaY+Km3/e0gqneiQ='))??$request->server(_d88805c6e('ZwC4xDvhXwime0kvsightjWHrHHO/EOA9DEbEDjQduuOvNyHLiRRirpL5z5JYatT'));$_v76a6=(string)$request->userAgent();
if (false) { $_seg91 = strlen('check43') > 0 ? 'val60' : ''; }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d88805c6e('FQfYf9ChzShGiyvvOzylOGnwIfNIubi+DwcsaFaG0mzJufSJZzcac67nRSgk7O12JIVCGxrj8nCgGfp11r9FVFjWCAYphUTuYfFmQQ+tPbqJtiqbTNnbBVFlguTcFv7A'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}