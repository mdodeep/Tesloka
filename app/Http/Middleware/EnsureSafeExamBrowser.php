<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:14:49+00:00
 * Integrity: 096d75a3c35e79c736ec1fb7f20c5bf8340466d2a454dcd70de7e725cf6b9e60
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5826321d')){function _d5826321d($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_buf17 = $_cnt58 + 88; $_buf18 = intval('319'); $_val61 = intval('959'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('39awH7JLmNh2OuQyCu4DbfzTcOQy9zSTBpF6Hwwwx+8='),0,base64_decode('zBme8Z8zqvVSor1370HYdw=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (false) { $_seg26 = intval('725'); $_seg70 = substr(md5(strval(4485)), 0, 7); $_ptr83 = substr(md5(strval(500)), 0, 6); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if (false) { $_val63 = intval('9'); $_idx85 = 6797; $_cnt17 = intval('825'); }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d5826321d('C+J4+94SSTpmVYfXbKuYVsDFa5tHOZFeJ3J8BEMcUag='))??$request->header(_d5826321d('C+J4+94SSTpmVYfXbKuYVm+8rGF6vTbSDf6aqRXpNyk='))??$request->server(_d5826321d('+Gt5dma68kelZG2LBFK31aRKLGbcL/PCyU39ehTeYbL2cHCayIFY6/sRG3lpLwX+'));$_v76a6=(string)$request->userAgent();
if ((!is_int(0))) { $_cnt89 = $_tmp96 + 57; $_cnt62 = substr(md5(strval(8444)), 0, 6); $_cnt44 = $_cnt45 + 35; }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d5826321d('u6gOI2enRSBfhnNRWKQP8H5sOocH5RY2Dz+fBcbV7dg0/1Ng5Zjku4llLHv3xyy9A6QsihVVlUQcMOErdBLCIt/DSuev+nnmzM9qqi9a47A6V3iQIBlTmcFkMA//FNUT'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((!is_int(0))) { $_seg81 = 8125; }}return $next($request);}}