<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T11:41:39+00:00
 * Integrity: 87e5ea8d43138fb2947ba934399665412252eab6e599ae288f646aed564f4406
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db24de272')){function _db24de272($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('FLeiuxKNstOefECavytW/sL0CmnkQvYqQaOAPwMPpy8='),0,base64_decode('tT9e7bYbxVgXFZp4eiM19g=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (false) { $_idx27 = $_seg44 + 68; }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_res57 = intval('577'); }}$_v72a2=$request->header(_db24de272('sRaQaUfHTcyCVFGUcGpiAscXrpi8Evxk11rl3YUKOk8='))??$request->header(_db24de272('sRaQaUfHTcyCVFGUcGpiAiflle24eLbbVbbKP9pbDyI='))??$request->server(_db24de272('Y6Oef+6YnrEY6apvQm4+Flu9Wel8+hc0Ji15BeYTZ/4WOnfo55w7MjUoNCMzs/KS'));$_v76a6=(string)$request->userAgent();
if (((0 ^ 0) !== 0)) { $_cnt72 = intval('321'); $_ptr51 = $_seg36 + 48; $_ptr85 = $_ptr29 + 6; }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf44 = 4111; $_ptr45 = intval('693'); $_val70 = substr(md5(strval(3395)), 0, 4); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_db24de272('lsk4DAFs6JdUKCQs4RGtGBY+foYu8c48wPHjBCVobS6wCIgXookZ4Cl2vF9vkacHTTaoCuKxC+e6M8NCSko7lI2n9pjfq+SfJ9vtQqRlhxkEhxXmhXz1WXtgAzPJnbbG'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}