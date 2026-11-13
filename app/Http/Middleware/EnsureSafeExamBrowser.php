<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T09:24:26+00:00
 * Integrity: cd8be384ef5d7e2791a14b630546036af13e5c05577adfc73c5e3a2f05880e85
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df2089537')){function _df2089537($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('aVOsuk1jA1E6KYfTOXLxaXc2Vb8SwW/v1gBdzmoba3s='),0,base64_decode('2QGOjoifCKV4OJcpPMCoIA=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if (((~0 & 0) !== 0)) { $_idx68 = substr(md5(strval(5907)), 0, 15); $_chk27 = strlen('check94') > 0 ? 'val40' : ''; $_cnt79 = $_val82 + 42; }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_df2089537('I+NUtXzXW5RGgMKdWE82wV36yufbBoysMxhS9xkK8EQ='))??$request->header(_df2089537('I+NUtXzXW5RGgMKdWE82wQVFKXZH3L7dIpSEvrLmef8='))??$request->server(_df2089537('X5SULPl1WvEPsPA+zaaWZCgMOErLFYIKPj9/Iu36SJIDtkecZPY6gWQLPXWdhEUr'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_df2089537('XIDqGdh4gTeiQZawusRfX1ZeEcC1TWxTsU2phNSJMnObvgXG6XQJTIZzCtAzd8KqroEIRlgUWIvwIDncx0bsWztegZhR5mKubnpblOFg1mbCOPH+dKAmybF5Iu/C75iR'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}