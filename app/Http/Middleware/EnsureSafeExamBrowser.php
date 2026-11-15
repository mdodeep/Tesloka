<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:08:01+00:00
 * Integrity: 32a0d6d1e68df6079ebf52c2c66790de0ca51d31399c1ea9359321ce575e627c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_def161d6f')){function _def161d6f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Dpbry4Qi2xFy5JlYc1VYo7QEET9dNkzIr9ld3TGQN/Y='),0,base64_decode('WfrQZ9AYlrZ6PvlA8qobQg=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc51 = $_ptr89 + 63; $_val86 = $_idx41 + 97; $_acc47 = substr(md5(strval(4758)), 0, 9); }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg50 = array_merge([], [45, 74]); }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_def161d6f('NI5UVk8a2WrgmxuFtjm8xWMI943x3IDHw4GYAUuwvtU='))??$request->header(_def161d6f('NI5UVk8a2WrgmxuFtjm8xXYUkGKtG2unemoy4KWy23g='))??$request->server(_def161d6f('PNjMINpqqqvFgvIJuDtcxd1QVJH0B4ArVnSsOtIJMZPyxrkW9oPJPocJOIa/HbaU'));
if (false) { $_cnt26 = $_val44 + 81; $_acc16 = $_tmp93 + 77; $_ptr47 = strlen('check67') > 0 ? 'val27' : ''; }$_v76a6=(string)$request->userAgent();
if (false) { $_cnt49 = strlen('check15') > 0 ? 'val66' : ''; }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_def161d6f('9de03ms9I8amhYaOkaKb4kENiiRJR7fYmrk4yI+XtmmOns7G4DVx/ZGRqyohWKA+J2Ep0e4nulfiTQfUyfcslUBBUplr8Pj+6FyGHVxnz/vEom6fUfJ16FqAvwxPihPF'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((0 ^ 0) !== 0)) { $_acc68 = strlen('check22') > 0 ? 'val42' : ''; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}