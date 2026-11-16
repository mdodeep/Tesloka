<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:44:39+00:00
 * Integrity: e3e930e84d69e4e551158d8bff0589806df09b46df84f244df75a1f61989a560
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d34d84f0e')){function _d34d84f0e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('X3iX0QbLq1ty87XAPhzDL2YUkO6m7BAsvTNsxWdDyeY='),0,base64_decode('uGuYqgypC3GOJtmPtHDU7w=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d34d84f0e('d2atSNIEFwPQRwVVBHus6ciLvj1wvlARwy3qqQAYXdA='))??$request->header(_d34d84f0e('d2atSNIEFwPQRwVVBHus6eumFWGELovq36VyPjm3F2I='))??$request->server(_d34d84f0e('ZEcPwnTHpO2ZtQjP/YyO6NOnCHFz++lJ28q04yNQu4WjhYP+cIdrIWjM3n14AdpQ'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (false) { $_acc30 = array_merge([], [3, 46]); $_chk16 = substr(md5(strval(4503)), 0, 11); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d34d84f0e('UPFL5XzIJzPy3eTdPIzFRXS0gbrhVn5ShWezuEMhzvryeo9zokeeNvUc5f894wjA1iUPckRTtxXoZu4E1feZ3yhYl2/tmcOhRcg7z7fb/+F/LrvshAQbmg7tttE5wZBk'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}