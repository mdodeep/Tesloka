<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:58:43+00:00
 * Integrity: 3dc1d2953336640e852424b26616dc079ca30419693ee27f8cb34c60b2f6da17
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d70d6a03b')){function _d70d6a03b($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_res48 = intval('849'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('luszWVML9uEsGqsbPY7r754r+Ooz81vHT1mgtLGFJhE='),0,base64_decode('Av7f5zWIBikHbV2PUaJZNQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg48 = $_acc86 + 66; $_cnt91 = substr(md5(strval(6622)), 0, 13); $_acc68 = array_merge([], [70, 82]); }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (false) { $_ptr21 = array_merge([], [75, 82]); }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if ((!is_int(0))) { $_acc44 = strlen('check33') > 0 ? 'val44' : ''; $_cnt72 = strlen('check82') > 0 ? 'val3' : ''; }}$_v72a2=$request->header(_d70d6a03b('crEqzDmgkQDS1I5g/hLBE06EuYFyTQWWJTuF6qdoPeM='))??$request->header(_d70d6a03b('crEqzDmgkQDS1I5g/hLBE2BvgHsN9jWQxTh1f7Hw3/8='))??$request->server(_d70d6a03b('XpzoY2xhJvizh/Fttk7PcrGP+v6x9rbA+GF7aEwCnMTUwS9XHOw1qwT8gMSDUtsG'));$_v76a6=(string)$request->userAgent();
if (((0 ^ 0) !== 0)) { $_val75 = $_seg13 + 85; $_acc29 = strlen('check72') > 0 ? 'val55' : ''; }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d70d6a03b('fTB15VyNW/H8sV5VUpL3exuXQtWdv2CBII97gP5FoWausdQipL2sMtNTaPye0OQ4jn1YVUu2P4Ugh7keBTMDqC7R71ojtV6Cc0Q4ek6KhGPCj5xgvCq5XvSOCK9gFVCa'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}if($_v72a2&&!empty($_va1cd->seb_config_key)){$_v94c4=$this->sebService->verifyRequestHash($request->fullUrl(),(string)$_v72a2,(string)$_va1cd->seb_config_key);
if ((PHP_MAJOR_VERSION < 0)) { $_seg50 = $_cnt24 + 15; }$_v9ce4=hash_equals((string)$_va1cd->seb_config_key,(string)$_v72a2);if(!$_v94c4&&!$_v9ce4){if($request->expectsJson()){return response()->json(['message'=>_d70d6a03b('04UO5PGsP+pBkSou/n/5MAA43ranaNRp+2gJ52iYQpPgLVE2mQ+y2TflRv6Q2+8Pp1QMcqv5PWogKbWklETp8aWMFwLewAdiKjkfMidWfUGQljKchlr2GYqlG1UIbiuT'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((0 ^ 0) !== 0)) { $_tmp4 = $_cnt77 + 25; $_acc97 = strlen('check73') > 0 ? 'val84' : ''; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}}return $next($request);}}