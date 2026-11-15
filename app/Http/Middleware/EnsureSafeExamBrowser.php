<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:06:37+00:00
 * Integrity: cf1490e0e40d44e80b28fdf590044dfef46bee366998158e0ab499e7710c3b23
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc5c9d55e')){function _dc5c9d55e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0lh+JFpBs9nzJg9YKHm1ArNF0LLVTqnCz6Zonhhnins='),0,base64_decode('qU0rIB+Ijzd+i1Hup3SGUQ=='));
if (((~0 & 0) !== 0)) { $_seg82 = $_acc71 + 10; $_seg37 = intval('393'); }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr79 = array_merge([], [15, 23]); }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if (((0 ^ 0) !== 0)) { $_chk63 = intval('63'); $_val74 = intval('690'); $_res36 = 4768; }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_dc5c9d55e('lii0/GujyLwcMl6VhxxTEjJzr8cDwy80asueJjAmNE4='))??$request->header(_dc5c9d55e('lii0/GujyLwcMl6VhxxTEm1n9R9OCQeHedFNKlDhuX0='))??$request->server(_dc5c9d55e('jFwRPLCwj0yXWp29ZobUF2q/npWMytzWpEG/0uchmabwlWPNXo+Ir9DpUFimpHba'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_dc5c9d55e('VLTSh1vEF7gi3BMD11tQcutwjm+gClErhFxHllxisGgSWLvZz7n7xPzxzDPWqNnK0eJZemd7HnfEYIvdGHFxKaxJHFqH+10EdltBlmyLp+uk40RYuUi3cWDjduCJkgUW'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}