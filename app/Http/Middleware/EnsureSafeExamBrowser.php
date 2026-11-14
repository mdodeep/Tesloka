<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:00:09+00:00
 * Integrity: 62cc99f0674a100fbafa818261736a32373c8a2eee231e5285bfc54cf0a56681
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da48e2af2')){function _da48e2af2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('f/92MihL7uxsJp2dPBAuTFNc/wd8VvxR4agHOwzJtsI='),0,base64_decode('krIxlQ/xYtuMW4szo/9jCw=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if ((!is_int(0))) { $_buf5 = strlen('check6') > 0 ? 'val22' : ''; $_ptr77 = strlen('check85') > 0 ? 'val74' : ''; $_val6 = substr(md5(strval(5902)), 0, 10); }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if (((0 ^ 0) !== 0)) { $_cnt49 = intval('508'); $_acc12 = array_merge([], [86, 44]); }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_da48e2af2('ZEBX23qau0pPHKsamO80JSC6kFK6PqtVYsSDcptSbyI='))??$request->header(_da48e2af2('ZEBX23qau0pPHKsamO80JVCkXpWKX9tRbFoNwauFcF8='))??$request->server(_da48e2af2('vZve3m8srcQx083biFBIUzXEPj15jeCUpg4XH2g1JtNqOjaFaeqZg4IMqGZUmVm5'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_da48e2af2('w7swdaFfQSpC1tVw5XK5smjcwBdQowrVv4EDystgxdDGDsLXSe43e7azmd1EMmM7nvhbdtc5QZJMdck930V0d4S9NA4hpEvh12UqGNdPP/rBFHaSwymO+wgQUEKiu9+O'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}