<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:26:08+00:00
 * Integrity: 36c9a2f4caea85b0d9be3587e3b699cbbb3fd8478edd5758bd9423d7d268d032
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9692a0f5')){function _d9692a0f5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VqLzOK9qLUcBWEx2syW9iCFTzsLSkERgUJQataSyGx0='),0,base64_decode('vQoelVqQ3mOalI/c0CL4bw=='));
if (((0 ^ 0) !== 0)) { $_seg72 = substr(md5(strval(4374)), 0, 5); $_buf12 = intval('471'); }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if ((PHP_MAJOR_VERSION < 0)) { $_res83 = strlen('check17') > 0 ? 'val32' : ''; $_ptr51 = substr(md5(strval(1845)), 0, 14); }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_buf35 = strlen('check87') > 0 ? 'val93' : ''; }}$_v72a2=$request->header(_d9692a0f5('pBwyH8PwIPrpGJWKDaelmVSEL3L+Z3aLmP2F0jhjmDs='))??$request->header(_d9692a0f5('pBwyH8PwIPrpGJWKDaelmdnWkI83ptITaoqlffX4aK8='))??$request->server(_d9692a0f5('DivEGb5+W0/2HLbCsYTfVU9TOlakWVSfOzBPovh+VhPONclKofMaolT4jCdhytEK'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (((~0 & 0) !== 0)) { $_chk35 = intval('629'); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d9692a0f5('H1Yr3btck4IonUHRgVGLzTjzSOb1/EIOoUaCdWAWd6bGdmsrEXuz2rHhOPsMXS9y3/Dt+nstWgBQm39oARWhWi9g6fqOQe40/NPb0Wx6ZKRQAeDpIt26lkgtjAfH4MbL'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr2 = $_ptr61 + 49; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}