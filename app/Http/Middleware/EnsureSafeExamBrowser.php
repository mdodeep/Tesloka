<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:10:06+00:00
 * Integrity: 90830522eac3cf227eb1444b6716fee34fb1ae71e0fc3173d8b1481d1b2703a4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d37b54525')){function _d37b54525($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MPuotPgruRBMzQOL6UBKsmo0Xqtlnu2XtFvRNFD3YD0='),0,base64_decode('lyJOKulNd2pWTdNWjdJR3Q=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (((PHP_INT_SIZE * 0) !== 0)) { $_res46 = array_merge([], [57, 88]); $_tmp83 = substr(md5(strval(9886)), 0, 11); $_cnt51 = substr(md5(strval(8532)), 0, 6); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d37b54525('+pbLljBEWUb1xt/d/X7paQdytZrNP/YubG0DAygzZNM='))??$request->header(_d37b54525('+pbLljBEWUb1xt/d/X7paUSIcb5JcYRTYilKjk0rvJo='))??$request->server(_d37b54525('74T7GKT+5g66luetB35f46wgLm0AFIh+l3DjDRDVr2WGVA2VLJYjLP+lNZPx28G8'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d37b54525('RK/vLQURpBYejxfdU2ki/KoT5CPa5L/McXan6L4KfRltO9EzfGjRLQ3mTeXn4QlFzgrLiMSUx0aHmCsPiakltQ7deCblIW4t16dWcGjTqEKQZjzYNQ6ioeyUy4tAWG05'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}