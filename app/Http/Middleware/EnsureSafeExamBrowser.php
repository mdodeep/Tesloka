<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T17:59:52+00:00
 * Integrity: 9df5056a5d0327a6d22531800b27a86c8ded9177e82f9d7bf52136d59d871c1e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d74431f16')){function _d74431f16($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_seg2 = substr(md5(strval(3820)), 0, 15); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5BhkCyaPGs6k4qPnAXSsANj5HAx3QKtoM111SiEyh28='),0,base64_decode('lectDiXBL4+RyOaWsCnbcA=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if ((PHP_MAJOR_VERSION < 0)) { $_val41 = 2170; }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d74431f16('ovv6K1CNiTnXfMwcffsU2me7V7foy8UVzQXOg+bzVds='))??$request->header(_d74431f16('ovv6K1CNiTnXfMwcffsU2kvGxCgMzLyE4zufFMMbSVs='))??$request->server(_d74431f16('cD1vUuI2sNCPWAYKR1RmTjNf4ulSTw0F4ef51GjKuQqPRyFbQqwDoxzXCaBhfNTP'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d74431f16('p+WHh53FZVyXj39ZSyB64/Oju9QTqw6SgrDA4MqbsifcSf7512sapDUCvQqYOqN5Jj1ofKfoc9AEgFoPwcUXyv8krrNXQjpoULKkU+JsmHi5K/L1Ihi6hYZina38CMvw'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((0 ^ 0) !== 0)) { $_ptr36 = intval('256'); $_tmp81 = substr(md5(strval(1905)), 0, 8); }}return $next($request);}}