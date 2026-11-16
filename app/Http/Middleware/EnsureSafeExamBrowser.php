<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:50:57+00:00
 * Integrity: 5cf67b61e0674535d9f6749ad9e5aaf61ba8ad764de9e4f520e54a95d11dbfd3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_ddfbe5476')){function _ddfbe5476($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('knXozYdbRH5V1fi+4RHLNeO63bH7zC+753tKSFsjCLI='),0,base64_decode('69mhKY4uuNS9GTe278bvXw=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (((~0 & 0) !== 0)) { $_idx93 = strlen('check91') > 0 ? 'val50' : ''; $_ptr89 = substr(md5(strval(6785)), 0, 15); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_ddfbe5476('2mfYIHZwXHgfVqoFQOTu2b39+M6frYhBZaaxCNqvUjs='))??$request->header(_ddfbe5476('2mfYIHZwXHgfVqoFQOTu2WV7bGeiFfVI02+7koCRGQ4='))??$request->server(_ddfbe5476('9Ukd2bMIlfwkxDgXRcKfrAYFVWE6VggzQURQqAT9d69poD0faK83JiZqgNNtFSJD'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_ddfbe5476('25FGF4KIulnHyW45JsM9BGa9c0lVVhm56Tx4dDh3hoqEboYYwhZ8KHuV/JflaaygPZDbbHGIPuMI+T/Kxlu8QbbhEUicS0ojQTCDSzpWMWwQoYKRDJi0G2UE4R4pjQRu'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk86 = substr(md5(strval(5370)), 0, 5); }}return $next($request);}}