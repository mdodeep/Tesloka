<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T01:23:55+00:00
 * Integrity: 03dd73e209ae763b7e45b9127ad9ba4052ed9339cd9eeca7000dee536483c9e0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df566ace4')){function _df566ace4($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt39 = array_merge([], [78, 17]); $_buf92 = intval('795'); $_res16 = 7141; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('q8X8VSgMEKRx1UrEfrpRSGCCcWwX2t0ZBZXsKmrHtTE='),0,base64_decode('yOD+zRJklcBp1Ad47h56pQ=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_df566ace4('ZfGo1eScoHj1oP/RqP5OlOc7FWpduAQwFtkNOmBBdmY='))??$request->header(_df566ace4('ZfGo1eScoHj1oP/RqP5OlO8TeUpQ88yk9VPZy8VI5ic='))??$request->server(_df566ace4('et+Rf8yCzk9vHQ5PT64ximIMiWRNnCRaJhg0Zf63EgpLkOAQKax2hD6NYys1xnCE'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (((~0 & 0) !== 0)) { $_val13 = 9325; }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_df566ace4('/EhAH8LgaA+gOpP6l+Ko4jL7ghJ8uk57SxI3rrt0EjGyCQcZ/ma1FGLiRpYHJgRvA5vh1Gwy/G0R5V3kmYORdhXt/VtVFv6xIirqmC9WhZL2GVqd/lmP9lMn6RcOBy3W'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk46 = strlen('check75') > 0 ? 'val98' : ''; $_buf43 = 2204; }}}