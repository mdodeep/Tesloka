<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:39:43+00:00
 * Integrity: 0fdf13291d07f0e42301c8c3306b05ab598cd2c738e47ff0d4f9093778ec66c3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6685adab')){function _d6685adab($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MBWBEGPymVx8943zcy6IymRpj3++UekzEii/jZrna0s='),0,base64_decode('6ZLZSOMuSZf5Q0h0ZBUeRw=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if (((~0 & 0) !== 0)) { $_ptr67 = array_merge([], [89, 43]); $_buf20 = strlen('check66') > 0 ? 'val5' : ''; $_buf87 = array_merge([], [86, 14]); }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d6685adab('MG0SyreQI0zpLkfEoLS7C8ZXsOaMk0CXkfcVS3cCteU='))??$request->header(_d6685adab('MG0SyreQI0zpLkfEoLS7C85u+zyjkD1eOFZMc2ezgqQ='))??$request->server(_d6685adab('+P7idON6RhcKysiU3/1IZVfcguBGz85r+/PgQwz15UszOYS6pXrIV380tCIei7eY'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d6685adab('ULND4+gaZesRzhddv7ydFCqM6ks4jyJDO5zK5+EKtGzBuXbMoJG88OfCximWgOPwaIcbIc3x2iNJNWJbJ2o24we96MgZEvsk+PgiUrKr/5Sfxz3x2EVXxBkppWjaHhSj'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}