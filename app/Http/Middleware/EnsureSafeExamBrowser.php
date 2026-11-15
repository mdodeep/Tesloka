<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:33:37+00:00
 * Integrity: 2b3991e3c76e9bc9bf2734c91098cdb4cf0d9001f915bddd01eea5f0b764f435
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1892ab7c')){function _d1892ab7c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('fk7ScfxFET5hYnyyCmsPWvqyx2HY1ukCWAphHAXNN/4='),0,base64_decode('VZEnTpDGghj6jaj4kn//pg=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d1892ab7c('5m07pKq8MIbxN808vgEJRKg8/1UTk/zrXQ57fortehw='))??$request->header(_d1892ab7c('5m07pKq8MIbxN808vgEJRHvun1dcVxHVyb6f+ebuNcw='))??$request->server(_d1892ab7c('B2/GDOaIRe0wRKXZ6fCXJj/H8olIgCWurOXv5Wz0e5rvpp36SmYTbsBWMg09QxAA'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d1892ab7c('a6+a76+3XnkOVkI1SiL5uomtn8sC79KKrVZV4gMz2rgRrKEucqWMFmaDN265ZcSlJX5pJShwXkd1eMb4S8ouCao/VfZX+UAA+scGxT3wYXvZwk4JYnDXjicI3daywLVO'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}