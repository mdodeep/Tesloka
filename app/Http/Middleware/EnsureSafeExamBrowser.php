<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T23:45:35+00:00
 * Integrity: 77663be56596b873b92abe6bccc47448a4f71dc1a2cd4fe86ff846550e946ec4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da9b955f5')){function _da9b955f5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1Eyq9aAADyG0GBOnxrTRQovYYxKuYnMdUKqFw7W7RLA='),0,base64_decode('EHSSIL07aRaIEe4YVRb9iA=='));
if (((~0 & 0) !== 0)) { $_val20 = array_merge([], [89, 51]); $_cnt31 = intval('891'); $_tmp75 = 3749; }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');
if (false) { $_ptr49 = 1642; $_val88 = strlen('check68') > 0 ? 'val72' : ''; $_buf71 = $_seg99 + 52; }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_da9b955f5('FsO0DTpiK27J/y1tew26T9AmFRq1PAZhCh0eU/e8yoU='))??$request->header(_da9b955f5('FsO0DTpiK27J/y1tew26T6y2rWlfp67mls9Hdr1Dka0='))??$request->server(_da9b955f5('KRqk49McjWYidLH+j33mwKl1I1QwsamTwMFFWRml90tbI01h/cqPcFlZbuA6pQOJ'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_da9b955f5('Tq5VWPxBVn2IKxP0D+kMkq7f7mlucj7yf4qC/ESIVjyZ4WYHxwTBpD6oCrQrFYypC5egStMgQHhrAXYVEC+WwqspgKnVWgrEPw0uEUi3J7jo2NGeGLYPvO4W66XXmjGh'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (false) { $_seg70 = $_res40 + 48; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk75 = substr(md5(strval(387)), 0, 13); }}return $next($request);}}