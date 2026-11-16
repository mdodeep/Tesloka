<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T16:48:11+00:00
 * Integrity: ab8dcbec4f381a73c000a540f5da45639f9c8e40ebcc1ddbc948e203c6c604db
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dac3bd877')){function _dac3bd877($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_idx59 = intval('819'); $_acc1 = intval('798'); $_idx83 = strlen('check47') > 0 ? 'val39' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JL0rHRqwEvtb9CWI7O/XUR/xklyDXdxrJXWoIMaaCRY='),0,base64_decode('CJg9KjGffPp6kAtytS1T9Q=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_dac3bd877('o0EmxrBiU5XEmDbztRL4F8IsM1LVywwlRQZ1EBFOxJA='))??$request->header(_dac3bd877('o0EmxrBiU5XEmDbztRL4F2T7IEaQUwNvhAmiAus0VTI='))??$request->server(_dac3bd877('uqPUCnc1dlS+2mnDZnpKQhFOnHT/tHBss3tJczMHxNXZ7z2+8kMRUkUzEI2Upzb9'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_dac3bd877('Yjy0GaAOhOlemTym5oQ1UBG3GdtTg5v+0zGxiZBPWRj0nNhNhyHaL69sjQCgtFbLlWALKvm/dXzMwH7y4txnLR7sepSf4NRrE66UT18nVq5wHvYDbnESt7meMgwfAoHl'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if (((0 ^ 0) !== 0)) { $_cnt91 = $_val90 + 62; $_idx89 = $_idx80 + 69; $_tmp66 = 9666; }}}