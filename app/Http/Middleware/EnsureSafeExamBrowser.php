<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:18:26+00:00
 * Integrity: 3ddb70f39474a65d6f1e659715367dfdc86ba7125b0cb12cfc1c6446c744b981
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d638dfdfc')){function _d638dfdfc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('FWBY+3BnugDRo1yT+CMpvoaGiCM5xmC0m/Y7kf8wRmI='),0,base64_decode('d5Fzz7V3fpPunfcCBhiD3w=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if ((PHP_MAJOR_VERSION < 0)) { $_seg25 = intval('334'); $_cnt44 = array_merge([], [17, 7]); $_idx14 = strlen('check26') > 0 ? 'val54' : ''; }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp46 = intval('803'); $_buf76 = array_merge([], [74, 46]); $_chk60 = array_merge([], [15, 74]); }}$_v72a2=$request->header(_d638dfdfc('5EFQcbOaqJ2aDdcqLXddyTc1/ZASxMKPjfSVGrMhZIM='))??$request->header(_d638dfdfc('5EFQcbOaqJ2aDdcqLXddyQdXfHtvvb8bjHplvGPqKvk='))??$request->server(_d638dfdfc('o/i6zBSourKVbiQfxrw5zL0J3CnQF+zMoN9FO/fvh9TrlwJvqU3ov035GhzA/2wR'));
if ((PHP_MAJOR_VERSION < 0)) { $_tmp52 = array_merge([], [63, 35]); $_cnt35 = strlen('check32') > 0 ? 'val0' : ''; $_cnt87 = substr(md5(strval(7944)), 0, 10); }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d638dfdfc('8FNznTXIRQN7LS2wCpLfdiT3jVE/hnMsMqw1E4Pm9347p0ltxj8DI5bNTabfBz99c3km/J8cbzZPrbEsUVXtARzAY68NT7FpHdPh8drdDtxsGnVqHMLmsOatJKPP1JB+'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc73 = 3154; $_val42 = 9533; $_ptr41 = strlen('check28') > 0 ? 'val93' : ''; }}return $next($request);}}