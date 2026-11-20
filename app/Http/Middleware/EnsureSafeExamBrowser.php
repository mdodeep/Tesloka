<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:12:53+00:00
 * Integrity: a306dc4c788eb6eaa4a2c3f208f02c66d20642bbc37e89cdc2c9154b697bd1aa
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7995e2de')){function _d7995e2de($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6Xx0FB1iGORJUGbXeAJ43+86t7FwdhAkCoRQN37apsI='),0,base64_decode('Th+PV7YwiAbJ/DvbQnxHIA=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp98 = $_acc38 + 84; }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (((~0 & 0) !== 0)) { $_cnt33 = substr(md5(strval(910)), 0, 11); $_tmp65 = $_cnt85 + 81; }}$_v72a2=$request->header(_d7995e2de('+h1R4Texe1c9KdQ4Fmy5dSOsflvN3igSJZIf7hwPFD0='))??$request->header(_d7995e2de('+h1R4Texe1c9KdQ4Fmy5dcTCTBi99cFwUlWbgIxY23M='))??$request->server(_d7995e2de('Oz8wylQcXhKM3athDQ6mzp38OQ6xRQ93idU/BsbsV2yRVx8ms8wHuxkK+Oy8PrHn'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d7995e2de('2cVPjJL8hcBaZtIhLST4pPSy6zfMFWHRZGteUTDPCqJpVaVs9qP4bvuBafrHmbXFlU1Vd6QfA5KdQbi7nQajOfHBx2pvi5dqG4rBphqpbRqIP5ONLo3iQ3TsoADpogBA'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr71 = array_merge([], [42, 86]); $_buf84 = substr(md5(strval(4057)), 0, 5); $_seg32 = strlen('check19') > 0 ? 'val57' : ''; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}