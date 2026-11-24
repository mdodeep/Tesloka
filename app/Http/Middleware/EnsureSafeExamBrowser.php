<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T00:08:20+00:00
 * Integrity: 7e97075b0c1d11d33345a82032b32d9a6731eec33cb5702f74d22d41762357b3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6bab9043')){function _d6bab9043($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('N55rh9/My02BgPRU1nR4OnOdGtIG1ov8HXQvkKNOX50='),0,base64_decode('8w5i3bwK67OGRU920tRnQQ=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (false) { $_ptr51 = $_tmp49 + 68; $_buf52 = 6249; }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');
if (false) { $_val33 = intval('26'); $_seg15 = 2492; }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d6bab9043('nDRIRiEsdmNeG2MwuMlR4MxCnkLUYgrw7hAHKQzuqBM='))??$request->header(_d6bab9043('nDRIRiEsdmNeG2MwuMlR4LdZ3aHfLyKgn8nOYscYSzg='))??$request->server(_d6bab9043('PKCyGySVFqqphyC7UjwDL6GTtjx9MeXM+d7OlcKq2xkrRWpBFifU6R8y7ee8riAR'));$_v76a6=(string)$request->userAgent();
if (false) { $_cnt61 = intval('721'); }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (false) { $_chk65 = 9000; }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d6bab9043('5VMdObQIHBi9VYsgNM5/nRufzbtsBRNiL0wysrDDFRjiybkYpMRhzIdgyykVrNtklIzjVJbz/dztuaq+CvgX+oPhHOSArQ4dmJ2yXI5Iqk6nYuaJytZaDmMOMN8jXgr/'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}if($_v72a2&&!empty($_va1cd->seb_config_key)){$_v94c4=$this->sebService->verifyRequestHash($request->fullUrl(),(string)$_v72a2,(string)$_va1cd->seb_config_key);
if (false) { $_buf32 = 2048; $_res93 = intval('563'); }$_v9ce4=hash_equals((string)$_va1cd->seb_config_key,(string)$_v72a2);if(!$_v94c4&&!$_v9ce4){if($request->expectsJson()){return response()->json(['message'=>_d6bab9043('3cLf5eOVKsRTTJ8BVVUV/OqbDnKwa/7Aoe2zSImJt2eXKW/ddKLrkdXonAUy4ZZ183qRmSOnEoiYFMXz/Psfiq2Vdrsnk50yj1IjGZeTS/UcOHQbZSvCLdeO1wC7a4RT'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((~0 & 0) !== 0)) { $_tmp52 = $_ptr64 + 18; $_buf14 = array_merge([], [31, 40]); }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}}return $next($request);
if (((~0 & 0) !== 0)) { $_ptr62 = 3985; $_chk47 = strlen('check57') > 0 ? 'val75' : ''; $_seg62 = substr(md5(strval(962)), 0, 6); }}}