<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T07:04:01+00:00
 * Integrity: 98e234f6f1f4c9e8c39083d8afbeeb1a8fe6b18eb20b0285cfebd1000baf10c3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d63b93b05')){function _d63b93b05($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('nYZD5+BpwDuADYe/BBRF88s6eA1n2Cz+jDpzq1i/ol8='),0,base64_decode('2qhnqX7kB8ljfMJ4eGiKug=='));
if ((!is_int(0))) { $_ptr42 = 2163; }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt41 = substr(md5(strval(8056)), 0, 13); $_chk49 = $_seg53 + 62; }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d63b93b05('zr2LU6jPiy4t/81FKIW9/FW7J30cnpT4ur7a6Jxc7Oc='))??$request->header(_d63b93b05('zr2LU6jPiy4t/81FKIW9/JHuLlsczKGT96D/q+2ZpnA='))??$request->server(_d63b93b05('PgS0JPZvzN9xMMGWrv8yMfwByBnPRyhMxxbRMvm+ia/6YxN+rQu6xN9hXx5LOmv0'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d63b93b05('nw3NZq6kjBI+ldeMTIL0ZSpQOWZmc4fjQvFMP5tKpyZEspkQQOwOIuqegWWp9nEIOL7BIbcNt0Hw2ywXZ4MvP0GVHNxVbp7aAoKXwdS6MTUhNvECUsVuhxSdM69SIbKx'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((0 ^ 0) !== 0)) { $_chk15 = $_acc78 + 55; $_tmp45 = intval('51'); }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}