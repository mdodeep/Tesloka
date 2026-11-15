<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:40:28+00:00
 * Integrity: d8afa62270f139dce3d4ed0f9766ada15192a183d4abdb06565216c2901cb57a
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d54dcc26c')){function _d54dcc26c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oQyYDOXKasM/HPWN/woPTPhpjzh6rRLhQxiQePvXJWY='),0,base64_decode('wHIRlWmzNACxps9mu+bUNw=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf99 = intval('379'); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d54dcc26c('rUFaYtZ2hxuniWqSxZiJ4SgV7zzyN0YpmLU2uTGqxow='))??$request->header(_d54dcc26c('rUFaYtZ2hxuniWqSxZiJ4T5fKXs+4haNpOQH9BTvcgs='))??$request->server(_d54dcc26c('rR1dQtdqI0mbDxZDbOnAEtSjtzseMV1cQv8Mt3YOE97Vt3tpaBPrNK0Eb2ZLMsqz'));$_v76a6=(string)$request->userAgent();
if (false) { $_seg4 = intval('93'); $_cnt78 = strlen('check17') > 0 ? 'val9' : ''; $_cnt52 = $_acc16 + 16; }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d54dcc26c('7fXr554/kHp9egcn0emoZ5NaCE/PH23ZwaXtfays0Cn6kSPbHzk2Qgqr+XDvlhuIG7ZhNwF8kTxZU6XFIcu+1XYoc4n6/nb1R3lLfxiGuiZOCUVzoOlcD35JOyH5hIsK'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((!is_int(0))) { $_buf98 = substr(md5(strval(8013)), 0, 6); $_res92 = $_val15 + 58; }}return $next($request);}}