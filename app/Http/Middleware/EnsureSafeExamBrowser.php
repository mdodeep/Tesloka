<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:12:03+00:00
 * Integrity: 827550dfee9bb5c5eb345a2beaa3a4c0ec71eb2e8d7fe8a9ed3961444bdfc0f5
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_ddc1b08b6')){function _ddc1b08b6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('J/rB7tXT+Oag0mXnJekf5G2ybn8lX/vCnK4h4TW381g='),0,base64_decode('/r9A8ZmsUJ00KpgiNfCO2g=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if ((PHP_MAJOR_VERSION < 0)) { $_acc29 = strlen('check66') > 0 ? 'val98' : ''; $_buf27 = array_merge([], [49, 43]); }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (((0 ^ 0) !== 0)) { $_res36 = $_idx36 + 96; $_res44 = 2711; $_idx17 = intval('947'); }}$_v72a2=$request->header(_ddc1b08b6('XUITPimxiA/Iss4syeLySgZWwVDJu/QwRBTxuenDlV0='))??$request->header(_ddc1b08b6('XUITPimxiA/Iss4syeLySgE9PC+3m4Fkjte6jjHDv94='))??$request->server(_ddc1b08b6('PV3Ja4R1j+KHCzxTkN0iz73knuSsXjeL7jdWxYeh++SEJELtrYvvspMFI+pAFi71'));
if (((~0 & 0) !== 0)) { $_res83 = strlen('check43') > 0 ? 'val75' : ''; $_chk67 = array_merge([], [15, 28]); }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_ddc1b08b6('Wmjra3QwfJX2FBDPv3Yyhor8FSRTYMsyHhszgFNkIJrBh21YMF9FGYYO1RxET1UODhIdEoPlQS/htkzqnucFWCjrTRUsxlrbalHNySeDgu5GyEVCmS3yWBIiuv9wHWoL'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}