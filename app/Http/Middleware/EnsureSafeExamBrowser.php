<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:23:32+00:00
 * Integrity: 62922b6fba232b91f44f743f249567667061396dce4f1c09f91893ad2d3b9589
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1684d8c7')){function _d1684d8c7($s){static $c=[];
if ((!is_int(0))) { $_acc19 = intval('445'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Q0/ygmQ2jEKyoe0eXfzD9711jmrBcN7uZL1l7fhOEw0='),0,base64_decode('zoCqdBqc7uohObkdwijMcg=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if ((PHP_MAJOR_VERSION < 0)) { $_res26 = substr(md5(strval(1014)), 0, 5); $_chk93 = array_merge([], [45, 68]); $_buf62 = array_merge([], [15, 86]); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d1684d8c7('zItosa9Bf2gBwfIV9gDiHzDYvScpzj0F26iNWcFltx4='))??$request->header(_d1684d8c7('zItosa9Bf2gBwfIV9gDiH/QUtIGc6nKttM74X2iFEJw='))??$request->server(_d1684d8c7('F9uqMomXhUdWdgfgoeOBI9VNduMQM5NnVzAapLX093zyGWEml0r4oU9QszhGKn5M'));$_v76a6=(string)$request->userAgent();
if (((~0 & 0) !== 0)) { $_ptr10 = intval('508'); $_cnt17 = substr(md5(strval(7342)), 0, 16); }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d1684d8c7('uvE61Gd9OZLpduAp4Lv74q4prcepJqWgYcaBhMpjuBX5fvd6Y1/zLHyID/A0UmGKhdh0ncJPZzfaRmKnhMiOHPAmTPBFETcB51Sh4H/p9pSrS2JrBwpdUqY9WwQrIvfQ'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((~0 & 0) !== 0)) { $_res59 = substr(md5(strval(7469)), 0, 14); }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}