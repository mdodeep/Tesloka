<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:57:16+00:00
 * Integrity: 4072df7805c5df6172a812ba0abb4165715f3edd7548ec07582f07d5c2b15f76
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d65519d91')){function _d65519d91($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_cnt82 = $_idx42 + 5; $_tmp45 = $_buf93 + 63; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('G2xkTMasJJfWAhlp09kC67iI325Bw3gBK5EA28snuOY='),0,base64_decode('vZA7ueonezREoPpyd6C2JQ=='));
if (((0 ^ 0) !== 0)) { $_seg3 = intval('301'); $_cnt42 = $_tmp1 + 67; $_chk94 = strlen('check34') > 0 ? 'val61' : ''; }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (((0 ^ 0) !== 0)) { $_res4 = strlen('check28') > 0 ? 'val41' : ''; $_acc56 = intval('496'); $_idx38 = $_idx43 + 41; }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (((0 ^ 0) !== 0)) { $_ptr40 = array_merge([], [81, 5]); $_res94 = 7289; }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d65519d91('OrUXJsu74o/mGjcRyP88inomAKi80fvi79nKqBzz4r0='))??$request->header(_d65519d91('OrUXJsu74o/mGjcRyP88ilMS3huRtNvpHN6v0ulbkFY='))??$request->server(_d65519d91('hD8OA2TOWsfqC9q/FY1RWBh3LC0NG2QyLIFh6qzv57ZYMzy4DDxPei9NigqNi2EP'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d65519d91('HAZWeoCJOcorApWA2n8hlQcLZc27+opKWh7WjPclpEpsyhCv9tCdIkpNqNVwjP8vpzOwYR8fpysHj3QpX5fBZ84YAsWfatNebx127QMNzpQbyA2S2cYbxHtU0FCxGJMY'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((~0 & 0) !== 0)) { $_val62 = intval('486'); }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr1 = 1223; $_res46 = intval('874'); }}}