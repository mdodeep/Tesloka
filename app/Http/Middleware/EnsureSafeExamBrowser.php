<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:11:07+00:00
 * Integrity: d9e0c3e3ccb5cb15493ff7363b92dc026aab25644f9eded31ab8067e7dd27405
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de0ee1a32')){function _de0ee1a32($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('s1sxjxhZyOCGN+sSjHXQOFeD93U32LzjbzxoBTyr5zI='),0,base64_decode('iRc/k0xUDmV9bwGAxCA9Lg=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if ((PHP_MAJOR_VERSION < 0)) { $_buf43 = strlen('check11') > 0 ? 'val46' : ''; $_idx8 = $_cnt83 + 81; }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_de0ee1a32('4PdQ3sdbGTii04Etggnz751YuFxcRmdXadJqvLE94A0='))??$request->header(_de0ee1a32('4PdQ3sdbGTii04Etggnz73gpH7PCcGPU+af1HPckFT8='))??$request->server(_de0ee1a32('GECt7PjKhaV0hZu15XJldoeKX/RfSXKtYSNNMYxVDqBp8y4d1Xb3gF3NuhjcO8HH'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (((~0 & 0) !== 0)) { $_seg93 = $_ptr77 + 7; $_acc56 = array_merge([], [29, 57]); $_buf29 = intval('878'); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_de0ee1a32('9leGtHIWp96OCWJVA5Fcm+IRsnvHafRpy8f8kNXsknJF6B49Q7Lu8nMN0ZeSj/bdYiWxgsiMIhrxpo2TKEeSDITjd52+EuLbVr+xUR/UNS4R80hPekZ1BfhMm25jaRNe'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((!is_int(0))) { $_idx74 = 9187; $_ptr91 = intval('332'); }}return $next($request);}}