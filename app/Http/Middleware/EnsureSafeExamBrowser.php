<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:47:32+00:00
 * Integrity: a598bf64f00008c783ad21f6af90c807f908ed697fcf9716f4d136daee24f76f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dad3e4f09')){function _dad3e4f09($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_chk87 = substr(md5(strval(1656)), 0, 7); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Uwtq7O/tP18hIj/UmCbm3cPKIUapyxtvQ3Ek86hElDY='),0,base64_decode('fzIY597smLz7eZeQFlRBhA=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_dad3e4f09('aMjZmyfZD7giZQYXF1tVw0PeU2tFU7nHUDhHgEsBov8='))??$request->header(_dad3e4f09('aMjZmyfZD7giZQYXF1tVw3Oervqxds/vwceIX8l6tj4='))??$request->server(_dad3e4f09('hj0yBKqTzByGiRRlAP7j7dg1sj3IEFKji4chEBp0kwYYUBIZxDXAMTBOmO6IanSR'));$_v76a6=(string)$request->userAgent();
if (false) { $_seg39 = intval('501'); $_cnt28 = 5319; $_val17 = $_acc44 + 27; }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_dad3e4f09('cyQhqkabOnTezYooKs3u/azyKt0o+tPMk/4LJqjH02a28mTueFS96AL5aBS8b0flN8TXC8cJ5p4cLm416hTIFax+mc+tpptNYffaNy2PDQOXNGIY0pi38yg0SMpFEjuc'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}