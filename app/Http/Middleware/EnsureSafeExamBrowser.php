<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T03:05:09+00:00
 * Integrity: 1e24c363d85e708fbdde991639b71956d2905d9444263065cd3e90b56657d275
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d98122183')){function _d98122183($s){static $c=[];
if (false) { $_buf19 = intval('319'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9pJJNuFQLW8yPmksT1g5X7bMHYJDKY0VVNAvfVizFLM='),0,base64_decode('6qFFo4BWI25WexaAzmcJ3w=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (((~0 & 0) !== 0)) { $_buf43 = intval('27'); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if ((!is_int(0))) { $_buf53 = strlen('check6') > 0 ? 'val91' : ''; }}if(!$_va1cd){$_vd401=$request->route('attempt');
if ((PHP_MAJOR_VERSION < 0)) { $_acc75 = array_merge([], [88, 0]); $_chk70 = $_cnt46 + 11; $_cnt34 = intval('783'); }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (((0 ^ 0) !== 0)) { $_acc57 = $_tmp79 + 36; $_seg23 = intval('272'); $_acc13 = $_acc86 + 54; }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d98122183('JslrcB7BNZFH4LByc88yDcFfDmCj3+aITsu6NdfQ3lQ='))??$request->header(_d98122183('JslrcB7BNZFH4LByc88yDbT5nPiHMe/4/awJzxbvxoU='))??$request->server(_d98122183('RxBbjOHdkgqkDX1PWKDwUCX2pKjiounWHlY9Wl82gz/ax7Ckh+FlEAkruPgg3xNx'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk35 = $_acc49 + 41; }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (((0 ^ 0) !== 0)) { $_seg12 = intval('235'); $_res78 = intval('556'); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d98122183('7RlKnRfd1J6+ihkbpNMreFsAY3NIQ9vmvB2+Kwy5BBhopToscyx1SBzbvB1evQCjAAQhwDXHqbvbuITh9k3EvvtMOuc+b332GEbeHx+qdHntsJYMGYDSOi4wDd5333cT'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (false) { $_cnt54 = intval('166'); }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg65 = $_seg10 + 67; $_res5 = 2396; }}if($_v72a2&&!empty($_va1cd->seb_config_key)){$_v94c4=$this->sebService->verifyRequestHash($request->fullUrl(),(string)$_v72a2,(string)$_va1cd->seb_config_key);$_v9ce4=hash_equals((string)$_va1cd->seb_config_key,(string)$_v72a2);if(!$_v94c4&&!$_v9ce4){if($request->expectsJson()){return response()->json(['message'=>_d98122183('jlUY/gE4VWWIIV4IUsP9rUyi4Nzv/UY0aBcK8e2bcmxZPBbbEc1oNwAjGZ4u95DwTYqI+hz13U1kD6UgjyIVte8H8UD6dtyO+K6L2ot8tq2rtHCdO5IzK62rRgw6wAuP'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (false) { $_chk68 = substr(md5(strval(6600)), 0, 12); $_idx62 = strlen('check64') > 0 ? 'val57' : ''; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((!is_int(0))) { $_idx58 = substr(md5(strval(847)), 0, 5); }}}return $next($request);}}