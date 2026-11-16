<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:47:05+00:00
 * Integrity: 2c081de88a09f26010759678eeb0fac06b7152875c6795cfafe5f71b9709c5da
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d976c5351')){function _d976c5351($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('K0ZjkgNiDpX0VVAfwiirX/rsIRsAizDm05Y0lfmoGwU='),0,base64_decode('5dZv1rkrqZo74XNnpZFSQg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_idx51 = 6369; $_ptr77 = strlen('check55') > 0 ? 'val19' : ''; $_res61 = $_tmp31 + 52; }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (((~0 & 0) !== 0)) { $_res58 = intval('942'); $_res56 = intval('1'); }}$_v72a2=$request->header(_d976c5351('+jhpKpFpcsxIf34BWLkBTyA81O1PL70FhV3ZIYMuns0='))??$request->header(_d976c5351('+jhpKpFpcsxIf34BWLkBT0wf7ubvKd7UUnUCYnIBO64='))??$request->server(_d976c5351('ZHSV4Sfb1BHg6oQ3N3OvjGPalcsrzcHKLW+hSOOMJyAn6XhV7RizArs5cSMDSM4b'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d976c5351('CU5ahUDnWU9ArXgyCmidzA3cgZ1hDiB8D/xx6QJ6PuW8PQu1r1EGwC8etEtbR1B3+GuesdCPbZNBv/oXrRb850YlJ9Y5B2CPDc7nQIkNZf0maDgK17CDkHCz9NVwBVJI'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((0 ^ 0) !== 0)) { $_buf90 = array_merge([], [86, 10]); }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_chk6 = 8098; }}}