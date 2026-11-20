<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:50:51+00:00
 * Integrity: 69d7fbbda759854011d62cb7beb30af0765144337ca67cd655825eb5efe13bc4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d805e2a9d')){function _d805e2a9d($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf91 = strlen('check94') > 0 ? 'val48' : ''; $_seg96 = substr(md5(strval(2988)), 0, 11); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mLoGxMDelQvkxZwsV0+Ik8O33kUb82GQSzMWDgxhWYU='),0,base64_decode('MKsQUtuQfUDupmNCMpQ/cQ=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (false) { $_val48 = 4071; $_buf81 = 3507; $_tmp42 = strlen('check83') > 0 ? 'val63' : ''; }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d805e2a9d('23R+vPsGlf2mkjFIjNpBlB7cqPI5U9NVsEF9TSbA0+k='))??$request->header(_d805e2a9d('23R+vPsGlf2mkjFIjNpBlHeihue3Sl/ELMqTtGfqAmo='))??$request->server(_d805e2a9d('lz/XwGgLGH45SQ4IplHOgivdbt4Ze3AbOkB1odKoQ2Su90FoNBfcxkrr3YS5M0Zz'));
if ((!is_int(0))) { $_val11 = $_cnt13 + 45; $_ptr69 = array_merge([], [82, 16]); }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d805e2a9d('MIE2urqSkpwl+yxFVD3v9sLGa085Wa6LqQ4VioIH5CrvlVAT857jDzzF4hBTo6EMH8AOpby/vvV/F+Dz11z16pDW/mBRIGpMZgGlpjrkEujTHPAo8gQTgeRMYkZvSuuZ'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}