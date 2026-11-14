<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:29:50+00:00
 * Integrity: 236dd0e3467bc4ce564f0c4033cbd8713f7abb388c86928344a1a6690f9242d6
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d41eba846')){function _d41eba846($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('cACTklCLHafVkwbhoSZh4uLWFhz/myLECg5gFOofKP8='),0,base64_decode('PaknfmzsP62PFx0L+FpRDg=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (false) { $_val67 = $_tmp48 + 19; $_seg37 = $_tmp46 + 35; $_seg36 = $_val68 + 86; }}$_v72a2=$request->header(_d41eba846('GPZyefH7dTQHUB1LpRRgrn+B8RgUAFFq8HDIh7zYvb8='))??$request->header(_d41eba846('GPZyefH7dTQHUB1LpRRgrtMwLr/rVaxkbkEZM+47s0I='))??$request->server(_d41eba846('ab97+bIiRN8IVL5L15moxkGL496a5NMVyGU3EZQ/kjfujbxC9M+7pe334sVLK31A'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d41eba846('jqE08b5zIWR2V6la2BfW0dqi5D+z8GMLvwo/pKpDvIOMOK1R0+NpoOHoBY3uX4muaihtwH/TDQPpF1P/Xaadn99pW//xFKdMDsk/mhZ1/WpPb4a6r8m7jnpKSgWZBBdY'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf40 = intval('935'); }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}