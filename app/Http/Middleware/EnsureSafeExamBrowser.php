<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:17:55+00:00
 * Integrity: bdeaf86c3382669bdfea6ebf51d5418a6e22948d723c091cf74131355cf40149
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0a81c9d8')){function _d0a81c9d8($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_chk93 = strlen('check66') > 0 ? 'val65' : ''; $_ptr42 = array_merge([], [74, 62]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('uEdv0SDLIyKGdw6sNaSmv+wafnzxXpHt3x3S6SV7s0k='),0,base64_decode('0ubASjzSmC4WSa/sp9WiDw=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');
if ((!is_int(0))) { $_res4 = $_chk76 + 37; $_acc68 = 3560; $_tmp18 = intval('290'); }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (((~0 & 0) !== 0)) { $_seg28 = 5571; }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if ((!is_int(0))) { $_val50 = substr(md5(strval(1291)), 0, 14); }}$_v72a2=$request->header(_d0a81c9d8('dXfXO2Uv+QgbgQ5JEhR4XWaBz8aEzpOcqXEuurK88OY='))??$request->header(_d0a81c9d8('dXfXO2Uv+QgbgQ5JEhR4XaQpNgsy8SU0aHFRyySh6F4='))??$request->server(_d0a81c9d8('8xuUnHTP46ngAYs6PRBYM5VO+QN+sJ2Ql4fVn8NMWtEghebDfFy/VfQIdDEubQSP'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (((~0 & 0) !== 0)) { $_cnt44 = array_merge([], [23, 17]); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d0a81c9d8('gk62zpYzdthurTRjcZ1cdKEIeQgLJ5r/BV7YiwlQLUx6ebVYqg0Hu5nqCLCEOVoAlsQwVppZjplGkqp9V1WkWcmiDWPqWvMu82StHgy/ti9TqoiUnTZLNcOq2U04Hn0D'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_idx38 = strlen('check50') > 0 ? 'val61' : ''; $_tmp4 = intval('297'); $_buf0 = intval('355'); }}}