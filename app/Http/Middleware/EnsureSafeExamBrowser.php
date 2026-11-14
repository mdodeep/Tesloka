<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:41:26+00:00
 * Integrity: daf5c66de71bc09bf0c0a2fb71b5b6723e05ef631f92f337e40f6b92ee499698
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d619a8b04')){function _d619a8b04($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_tmp50 = $_res38 + 42; $_seg91 = intval('634'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ve4Ooa7Fg/xs+1B7fUFVrkuQOeZLc2ZFg1kmdkMNNOE='),0,base64_decode('gsCim/RWKTAi2alYTYHC5A=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf97 = intval('80'); $_res73 = 8122; $_tmp64 = substr(md5(strval(8297)), 0, 15); }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (false) { $_chk35 = intval('994'); $_tmp51 = substr(md5(strval(2393)), 0, 14); }}$_v72a2=$request->header(_d619a8b04('YPba8KD+2RCVAweA4qy/+vCSE+1CisT1Wk+T0X2YSc0='))??$request->header(_d619a8b04('YPba8KD+2RCVAweA4qy/+gxXd/fnTt9vPauM6z8xQ2Q='))??$request->server(_d619a8b04('fyrJ5Kw1rJ27rVg7pypLJR3Dszx0XqT6/SoM52VK3bVx5By5vGy3lLga1InvKksP'));$_v76a6=(string)$request->userAgent();
if (false) { $_acc7 = substr(md5(strval(4790)), 0, 9); }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d619a8b04('XM150/7HNNUEZXj41wusRMPLGuo1txbu9J46ud8WcUrrYB0Y90IYlVivk52qij6K1QGCdHmekvdXDjWp/mCsKXRxZHsg+d1/ds8/X+TrKBntbm2KbIYgQbgY0lwWcVTp'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}