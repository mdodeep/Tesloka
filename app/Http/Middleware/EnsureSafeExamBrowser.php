<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:38:35+00:00
 * Integrity: 8fb32f9c498b75637e4210b82223abef44c55b561a70cd4ce9a36aab7d49c102
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd62f2dfb')){function _dd62f2dfb($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('dJHfpXksitkHdesCyDOb8GjNqtab6UNJrELr3zc5opY='),0,base64_decode('Os+3CgjfYh2GhdU23MSq1w=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_dd62f2dfb('DyPtDcX9sTesqwesTSe6ucPoPEQDr494jOpXzxWqH0Q='))??$request->header(_dd62f2dfb('DyPtDcX9sTesqwesTSe6ubxRu7m2Ory+Bd/NKf4loD4='))??$request->server(_dd62f2dfb('pKlqE1Q05ZyGJx1Rnyus9XLVFgsqrKylPq4Wm8z0mGZFwxSQMAQlybQ2A7UNclQH'));
if (((0 ^ 0) !== 0)) { $_idx12 = 1251; $_tmp47 = 74; $_tmp37 = $_idx27 + 14; }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if ((!is_int(0))) { $_tmp44 = 2038; $_buf12 = strlen('check22') > 0 ? 'val71' : ''; $_chk26 = $_buf46 + 99; }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_dd62f2dfb('vRzguxTC6EjePdol+SiA899wFdvHpaVzYodNNXl19E9ofGvfuKDkvCvnu6iP+W6Sq1qHZgb1o1ijLBw5iBTyW3un8RFzIuK1uwRFfG4iT45kjLapAGcsCQIOSN2KUgz1'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (false) { $_idx64 = intval('857'); }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}