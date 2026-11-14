<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:52:39+00:00
 * Integrity: 2474375cdffefca3312fed197f4d5978af35cf7ce2041d9337b6c641bbaffc53
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d619dabb1')){function _d619dabb1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('frn2bSbSUi8BjQ1tEf1FlupNyse88s1PdQOlmgKSHLE='),0,base64_decode('Pt5+OqKY9BVnVnfsr97hvg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_val65 = substr(md5(strval(2867)), 0, 4); $_tmp51 = array_merge([], [13, 84]); $_tmp70 = substr(md5(strval(9385)), 0, 11); }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d619dabb1('OiO5NygvU/VUhqJE/S3MkEssEojQijFsib9YmqfvMnc='))??$request->header(_d619dabb1('OiO5NygvU/VUhqJE/S3MkB+gjZJ9sDkxjUn7VEIoL3E='))??$request->server(_d619dabb1('mgwT1BcDrw1ZDg6jK2KqoUJpMdsIGZQZBhtINJlY6z94Gu4QaglY5uePg8Q+8esE'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d619dabb1('MFzw6nXzpK/PVE42N4td5q1M56JlcoB/QiTqdPh06sxueYFU5Vz/p4okVQHDNpKdFHWd9O/5z/YYvIRJu8QHG/JsmeTKNhHoLOE9ocb1VVT7MGurVXHYE/h+RVHbYEJc'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if ((!is_int(0))) { $_ptr82 = array_merge([], [77, 25]); $_tmp38 = 2364; $_res74 = 5135; }}}