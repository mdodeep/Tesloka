<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:16:51+00:00
 * Integrity: b673b20a2930094cebc22ad245023decb7a42598d258d4d6d8c4c6cb6524651e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd8979c73')){function _dd8979c73($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('fGisxHmmwmEbxxWO26yQgcS/F+/WUTOuBtOXz/Elvek='),0,base64_decode('daDRy3yu7v3yrZiIrQh89A=='));
if (((0 ^ 0) !== 0)) { $_val94 = substr(md5(strval(7763)), 0, 10); }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (false) { $_acc15 = substr(md5(strval(5372)), 0, 14); $_res1 = $_seg52 + 35; $_res61 = strlen('check23') > 0 ? 'val7' : ''; }}$_v72a2=$request->header(_dd8979c73('i11H6ViiFCineFQFgwqKCV1cI+NikWS7LG8R+ja8HRs='))??$request->header(_dd8979c73('i11H6ViiFCineFQFgwqKCdCv+wgUBsTNMOCOBuNFjB8='))??$request->server(_dd8979c73('TE7JoGhWxzEJv9sHtv6tAd6bsATdYbEQGDz4yjqYBW8yWNaFSuDtieHOwswON2gE'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_val67 = 9335; $_res40 = $_ptr67 + 7; }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if ((!is_int(0))) { $_acc33 = array_merge([], [54, 39]); $_ptr65 = intval('542'); $_cnt86 = substr(md5(strval(7414)), 0, 4); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_dd8979c73('hXtHtZGtt0PMGdf+VwKkVYBYtCwp5rpVusl3FprsJguMQ8Z6xhoFKMsbuCg/zJdvv8U+L+/yDcB+y4xO+Wxu8rz8HmJBwsrUMEm7e3CxfIKs3up/FMHPBwOZvq0Li/kM'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if (false) { $_res50 = array_merge([], [4, 81]); $_cnt30 = 5283; $_idx65 = substr(md5(strval(8855)), 0, 5); }}}