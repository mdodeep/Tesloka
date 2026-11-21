<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:45:01+00:00
 * Integrity: b940e2dc30758fd76afa973e85cb082e1fd61410b030bafe5189b3fcbd3e2669
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de41b8258')){function _de41b8258($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('M4u8tNR/w1gKleunVA2r7vyrmxlqvH3NsgQ4IrrcYjw='),0,base64_decode('ECvpygGImCF0Tfvx+YMOlw=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if ((!is_int(0))) { $_cnt5 = $_idx87 + 78; $_tmp62 = $_val46 + 22; $_idx38 = intval('869'); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_de41b8258('tW8Mz5R+ayMtjfs7BJOo9RLS+1a620fQCnZd0kiUNzc='))??$request->header(_de41b8258('tW8Mz5R+ayMtjfs7BJOo9XJd1juJiobFnWHMao9HrR4='))??$request->server(_de41b8258('VfTePkZ9Po3p0jTIcu0SsElpHi4ItHHnt/zQCOEbTzGD8krmFcziJOHUYg98aIKz'));
if ((!is_int(0))) { $_tmp39 = strlen('check53') > 0 ? 'val8' : ''; }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_de41b8258('bJR4zjuDh9h/1sRGGIiQXY+KtM82kY56njSSDAZ5FtnlMXant/UKGAadzlVtJpVWtzsY5G01E5Ao1ZL4e5EYh4GaEPCr//hFIHCw9TIlo8EOGNMsuHD21kxbrHqJU2sK'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}