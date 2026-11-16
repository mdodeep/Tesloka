<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T05:39:17+00:00
 * Integrity: 33665508b4ec9a26290e522f48c3ed0f715601104515c80adb5c5f76034527de
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d82ac0472')){function _d82ac0472($s){static $c=[];
if ((!is_int(0))) { $_cnt6 = intval('864'); $_tmp19 = 4217; $_idx70 = array_merge([], [53, 26]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7U0EYl8abgGa+0Xf+HhoCb0/1PZodT8lKZPpBpGzB7A='),0,base64_decode('VtsDC+cML/Yaul8H6StUbw=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf67 = $_val42 + 53; }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if (((0 ^ 0) !== 0)) { $_acc13 = strlen('check83') > 0 ? 'val38' : ''; $_seg42 = array_merge([], [62, 63]); $_res25 = substr(md5(strval(6845)), 0, 16); }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (((~0 & 0) !== 0)) { $_ptr78 = 5743; $_ptr24 = strlen('check8') > 0 ? 'val4' : ''; }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (((0 ^ 0) !== 0)) { $_val28 = $_val59 + 59; $_ptr61 = substr(md5(strval(7644)), 0, 5); $_buf52 = array_merge([], [11, 97]); }}$_v72a2=$request->header(_d82ac0472('h/JpMnjCn2X14KGnAqTzIorxGijTe3VbZNBnnAPSTH8='))??$request->header(_d82ac0472('h/JpMnjCn2X14KGnAqTzIghJExziW+MkXNkyBPgjNsM='))??$request->server(_d82ac0472('UNSDXQ/4MWDZbABeqLuRmxjDc42psWmgcFNgszV21rPBR9nZ/O+0Z8oxtOEG1HLV'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d82ac0472('+ZmGmF8AqXZaeMgmUtdcscLGuQCFde+X1ASCmMMMu3RGP/a/MX6CzCAiF5dLrp+8V4o/UamN+5mDpMFnvrUsRPCcthCZ4KoF95yHksJEv97lZAMhakY/1xXie664k/F2'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((~0 & 0) !== 0)) { $_acc50 = $_tmp27 + 100; $_chk89 = 3793; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}