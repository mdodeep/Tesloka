<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:21:22+00:00
 * Integrity: 1288d8c03502ab6b0836b8c6f127e3e459d217625768cb5178f28a6b13cab141
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d092e9c1b')){function _d092e9c1b($s){static $c=[];
if (false) { $_seg93 = intval('373'); $_val34 = strlen('check78') > 0 ? 'val22' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('RJDX90le9vKZiyAetpv9/uQ5fexUKVi0R9oA32do4cg='),0,base64_decode('lW+e3dCTXDbRziohzfMMUg=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d092e9c1b('FEnq8fypNjT3CorYKccgioeM/Ve/sn1+p9cgDlt9Jpw='))??$request->header(_d092e9c1b('FEnq8fypNjT3CorYKccgiuubtTHKSLLaOUsGygHZemM='))??$request->server(_d092e9c1b('jiEUvD19NOAMBPXP6nYsWPvsermeVM3bAW2aEfPhJNvehRL2cM+9IFZzF4RW467/'));$_v76a6=(string)$request->userAgent();
if ((!is_int(0))) { $_tmp26 = $_acc90 + 96; $_acc46 = array_merge([], [63, 46]); }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (false) { $_ptr4 = intval('634'); $_seg42 = intval('545'); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d092e9c1b('jfXLLUjjOa9IPbeF/hBIP5ydkeMZeV6fd7A4RXqc7E5C26o0lGyeu6chI73nb0HP6FhTRy1X3p4xYTXavxSnKBH+HgnC/w4PaCp0SFfKCwLLExHShfGWAGrYgNEPX++l'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((0 ^ 0) !== 0)) { $_idx37 = substr(md5(strval(9432)), 0, 16); $_val28 = intval('487'); $_ptr14 = $_cnt32 + 88; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf66 = array_merge([], [65, 69]); $_tmp15 = array_merge([], [87, 89]); $_cnt37 = intval('882'); }}return $next($request);}}