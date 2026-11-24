<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T17:19:42+00:00
 * Integrity: ce5546e3b06a0b51173f929af6400b66496593d860eae83b4b01ecf9fcf73e14
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6e9e3f01')){function _d6e9e3f01($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('gYLaTkQ0t0alWfYzuq0xQpTy371qOElHyvQV79zivRs='),0,base64_decode('t5EY/KpEHDZZBCU2vsY2Dg=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if ((!is_int(0))) { $_buf5 = intval('857'); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if (((0 ^ 0) !== 0)) { $_res14 = substr(md5(strval(4998)), 0, 4); $_idx93 = $_ptr29 + 88; }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt83 = strlen('check59') > 0 ? 'val2' : ''; $_idx16 = $_tmp96 + 71; }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d6e9e3f01('y9mxw8vRnDI60we1ME4Odk3gNAUdUvlXMPjwKbNegEM='))??$request->header(_d6e9e3f01('y9mxw8vRnDI60we1ME4Odr1pWfN4k5VQM/LmHsOB9Sc='))??$request->server(_d6e9e3f01('EJC1PMVrDhFUnVOJrO1+mggmnhffup1BWza/IxK6hKlj3vLu/JiMWRYFT8azmQCp'));
if ((PHP_MAJOR_VERSION < 0)) { $_chk6 = $_cnt33 + 6; $_res45 = 1969; $_cnt48 = array_merge([], [26, 87]); }$_v76a6=(string)$request->userAgent();
if ((!is_int(0))) { $_cnt57 = substr(md5(strval(2878)), 0, 11); $_val64 = 1030; $_cnt46 = intval('284'); }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d6e9e3f01('TQFjLHmD/y/LmEkbgiBMjO1dBVfEaDA+09ZuultYcy+ExprZV37MsHZV4WLiWiJLObnCYm9sY7DZG1QFvbiY6NVtLjT3siIsvrurqZVF4JgRezlHtXN2v1SqLOngp3rK'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((~0 & 0) !== 0)) { $_chk5 = array_merge([], [61, 40]); $_chk79 = intval('823'); }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}if($_v72a2&&!empty($_va1cd->seb_config_key)){$_v94c4=$this->sebService->verifyRequestHash($request->fullUrl(),(string)$_v72a2,(string)$_va1cd->seb_config_key);
if (false) { $_ptr73 = strlen('check76') > 0 ? 'val13' : ''; $_chk40 = array_merge([], [91, 35]); $_seg89 = $_tmp48 + 37; }$_v9ce4=hash_equals((string)$_va1cd->seb_config_key,(string)$_v72a2);if(!$_v94c4&&!$_v9ce4){if($request->expectsJson()){return response()->json(['message'=>_d6e9e3f01('XHIW0URty5nQHhrDgPAwAgvodmxKMqd02gbBU6izjpkuGhKKql1pUmGf77LRQ6ylKwe1ejsIoaODg/q9TLlaKGqhjpNz+/RhmZclRgpLSX+GnoyHmKvJUHEe7Ey3tk2x'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((~0 & 0) !== 0)) { $_chk82 = strlen('check34') > 0 ? 'val41' : ''; $_cnt39 = 6501; }}}return $next($request);}}