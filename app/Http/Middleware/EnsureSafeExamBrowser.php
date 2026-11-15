<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T06:42:17+00:00
 * Integrity: b463240aa949947e7c92e3e9a908659b247406f07d59d5f537c214f6a4e9553e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_debec0c62')){function _debec0c62($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('x6GpRv+ilCWmL/z1wLQ7yv03UksgEYWIEvZFtmizDwQ='),0,base64_decode('j6weeTne3075y7bTSK5thA=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (false) { $_buf41 = intval('168'); $_ptr66 = 7280; }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if ((!is_int(0))) { $_buf63 = array_merge([], [37, 49]); $_res41 = substr(md5(strval(1052)), 0, 13); $_chk10 = substr(md5(strval(9620)), 0, 4); }}if(!$_va1cd){$_vd401=$request->route('attempt');
if ((PHP_MAJOR_VERSION < 0)) { $_cnt80 = array_merge([], [76, 32]); }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_debec0c62('BIVmM5H9kIgvpGYZT91X0F9hpA3UD85NgI5Tk2OpBXg='))??$request->header(_debec0c62('BIVmM5H9kIgvpGYZT91X0Epkjagd5oK8We1V6PHMA5I='))??$request->server(_debec0c62('OVzUEcFp153Lk7xPLfFKKhKXs7AUgpub1yhS7hjeO41g/XNslEX3A37Z1+MB1h4t'));$_v76a6=(string)$request->userAgent();
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk50 = intval('291'); }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_debec0c62('u7EukeloV6jiWtOehNVTiybBtqm0F7T1ZFOTVJtQCBdBQpfkTZCrdzcOG46RNaqC5GKnDanB9cHJecec/L6kpaF8By7g3yXcBn7ZoxPC67mJcohykDYEZiyayW3ruyf2'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((!is_int(0))) { $_res10 = 3577; $_cnt73 = $_buf55 + 98; $_tmp4 = strlen('check85') > 0 ? 'val35' : ''; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}