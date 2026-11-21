<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:32:20+00:00
 * Integrity: 478a70a0514ca4b030cf683c5df8b15a4375318e1e3ca01055d8d807b786e642
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2256fb0e')){function _d2256fb0e($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_res71 = intval('530'); $_cnt42 = strlen('check25') > 0 ? 'val53' : ''; $_idx77 = intval('422'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HseUH39yHPac8h6p1ABo+XzK34tAxL8Va+scHKBEeps='),0,base64_decode('5t5MkcbU5ON+7gCq+E+UBw=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if (((0 ^ 0) !== 0)) { $_chk25 = intval('216'); $_idx16 = intval('908'); $_acc67 = strlen('check31') > 0 ? 'val6' : ''; }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d2256fb0e('IYHV5SgIWllGdvnQoRGT7e5maF0AaCrukXVjnGJBr8g='))??$request->header(_d2256fb0e('IYHV5SgIWllGdvnQoRGT7VHX+YptXz7TyEq6UAs/o60='))??$request->server(_d2256fb0e('ntVrEeVZSDjKC5gW4QS/GNkcnyWwpNTflHuZzsrmYL0/D+n0fSt8F8d/Oef3NcaP'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d2256fb0e('6yoJ7Fh2D9hpsDS6AFPeHZJi7NRHDb3kj464Kfuj8YTq0ZndhmlnjHpFNYFUnSDPFoLvd9das9/AR5s1RsuVmKWOt8qS21dhIbjgwbNqqFPak8k4w+6vmTNtYFn+Cxh+'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (false) { $_res82 = substr(md5(strval(5967)), 0, 7); $_ptr32 = 5074; $_res82 = intval('370'); }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}