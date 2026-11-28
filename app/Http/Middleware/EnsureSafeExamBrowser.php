<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:58:08+00:00
 * Integrity: b569a6ea1f737116fac7d003fe121953f2ad02dc4ce5a5b026441832468f85b4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc532e3d9')){function _dc532e3d9($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf72 = strlen('check14') > 0 ? 'val32' : ''; $_seg28 = substr(md5(strval(9931)), 0, 13); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3PcF5kc37VdLCXw8u5YfEWxSMZ4Fb48XSR69r0QizK4='),0,base64_decode('siR+i3FGR0KRl1TILJ997A=='));
if (false) { $_ptr66 = 4973; }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');
if ((!is_int(0))) { $_ptr83 = $_buf31 + 35; $_chk44 = substr(md5(strval(7020)), 0, 15); }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr97 = $_res59 + 30; $_idx7 = intval('531'); $_idx12 = 2555; }}$_v72a2=$request->header(_dc532e3d9('JDS51LG+eEtwqlqzx5JwXogQETWXeL+cmZg/Bw1T+I4='))??$request->header(_dc532e3d9('JDS51LG+eEtwqlqzx5JwXmFx4jticvn8o2DC2WfzUyc='))??$request->server(_dc532e3d9('Kyu8NiX4U7+5sPj0lz+8d6D+qX2Jkk7SW7Uaht4AQcdozC73p3dlxJSkTYPFd1rC'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt92 = strlen('check25') > 0 ? 'val92' : ''; $_ptr23 = $_seg9 + 55; }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_dc532e3d9('IFgDdivfXavBJGbuRsOjrh8aPD1CWt3nduYiBXayEbwy8PTAs6CZJEVvr89+ya3OV9k/XX23yPBuTWZcqqjZnNEPwMIrCZ5OIcadClamvwou+yUZR3+qH8ZJQ6DY78Zf'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}if($_v72a2&&!empty($_va1cd->seb_config_key)){$_v94c4=$this->sebService->verifyRequestHash($request->fullUrl(),(string)$_v72a2,(string)$_va1cd->seb_config_key);$_v9ce4=hash_equals((string)$_va1cd->seb_config_key,(string)$_v72a2);
if (false) { $_idx5 = $_chk83 + 42; }if(!$_v94c4&&!$_v9ce4){if($request->expectsJson()){return response()->json(['message'=>_dc532e3d9('89Y5gMXy0CWZ3HjMoKTj+K2/N9RyIlBrhrRS/G9Py937LEB3XzLWhTadmBDiIrJioCC6qHMwze5SWAAogjK12/8AGW5jCT4UR+LZQLvaro2kNqORyte588uHoPtZYrh5'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (false) { $_val87 = 3371; }}}return $next($request);}}