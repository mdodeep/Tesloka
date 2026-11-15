<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:14:13+00:00
 * Integrity: 18b57aa627fd74aee36ec4e10d76eb437cbf3e3f51cf591ed361ffcb18cf37ac
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc8985528')){function _dc8985528($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx82 = 9522; $_chk81 = $_ptr49 + 80; $_idx41 = $_idx12 + 73; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Y2k1/vfyvl0G1/SCyJB9TToZXbPVu0ghuwF9FdQon2A='),0,base64_decode('oSii08Uzy20ReeUN8Ji2VQ=='));
if ((!is_int(0))) { $_val69 = intval('352'); $_ptr35 = $_tmp3 + 14; }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if ((PHP_MAJOR_VERSION < 0)) { $_buf74 = strlen('check40') > 0 ? 'val98' : ''; $_ptr46 = $_buf56 + 24; }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (false) { $_cnt71 = $_res67 + 53; $_idx20 = $_ptr44 + 5; }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_buf60 = 2817; $_ptr30 = intval('540'); $_val36 = strlen('check76') > 0 ? 'val90' : ''; }}$_v72a2=$request->header(_dc8985528('DSCKKqwJexttMH6DzFuTtyABk9Zn45YACU5a+bSiTew='))??$request->header(_dc8985528('DSCKKqwJexttMH6DzFuTt4gbE4bamU6BMlUHyotxpI0='))??$request->server(_dc8985528('EMW3Lk80H7QYRCl5tlpbd6DoFXaoS3O0suwb4N8AUIa0j0X+u/k6c3WLbwgLDMWS'));
if ((!is_int(0))) { $_seg17 = substr(md5(strval(9032)), 0, 15); }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_dc8985528('qY2rS/0XEQq/OcMKW645kGLfI5jepH+lWczk5f/xZYc7iJ+jQGxXbs9fc+BKWHd8cjKGJaxDVcuQBd4DiGT/MGnXv5V/CPp65XKSoqKY2/SJPoXzKyOTmE8eEbTlcoSa'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr45 = $_seg35 + 72; $_tmp78 = substr(md5(strval(1530)), 0, 8); }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (false) { $_seg12 = 7217; $_res21 = intval('419'); $_acc97 = substr(md5(strval(7157)), 0, 15); }}return $next($request);}}