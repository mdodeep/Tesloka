<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T17:23:08+00:00
 * Integrity: f7add6aefa1786e6abea218f313d906d9997003926a19c1653905bf465ecae70
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2bcaba0b')){function _d2bcaba0b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('PDepxp9FmJTM3QHI19sNpPaivNQ2LFr4STjwb9pVjw4='),0,base64_decode('BLQyNoFE0sTiVHFJcfFVGA=='));
if (false) { $_buf29 = array_merge([], [36, 52]); }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (false) { $_acc51 = strlen('check84') > 0 ? 'val92' : ''; $_res8 = substr(md5(strval(1830)), 0, 16); $_idx78 = 7989; }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt32 = 9703; $_ptr40 = substr(md5(strval(8007)), 0, 11); }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if ((!is_int(0))) { $_tmp41 = array_merge([], [28, 94]); }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d2bcaba0b('Xj0mvifhh4Dc/r5+T6iyGIgxaN215PamWRzhlBsxWhA='))??$request->header(_d2bcaba0b('Xj0mvifhh4Dc/r5+T6iyGNXHBo72tCvHGKsMULk7sDk='))??$request->server(_d2bcaba0b('KBSXGEnQ5sBbqTp6/AnmeLIi5g9ulKQIA6c2rBe9VbhETE7zaTOaFhyDd7jlG1YF'));
if ((PHP_MAJOR_VERSION < 0)) { $_tmp63 = substr(md5(strval(6564)), 0, 5); $_tmp69 = array_merge([], [1, 58]); }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d2bcaba0b('jgnYqrl0iyml+v+Xy1UxJLQG0Ls1gZ6Qo7j44Od2eG9ONko8JxuBZxiAGSlIZg8w3kWYxCH+oWe5w7rFEPUiNQPklWBRaCpXr7YK6HwdWkImopwB71dfPFZyXTQet+iw'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (false) { $_tmp15 = substr(md5(strval(5103)), 0, 9); $_cnt27 = 6827; $_acc97 = $_seg44 + 36; }}return $next($request);}}