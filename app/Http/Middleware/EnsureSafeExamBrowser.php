<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:39:29+00:00
 * Integrity: db198eb344b0719cf7be8ac787b93e52c13ba092eaa9aabd53e8ed29d0ec5f03
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_daaae34c8')){function _daaae34c8($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('+MbyorGYjrowOwRo4yQEe3IV0HA6kAiqrhqY3wyy/pY='),0,base64_decode('kd5SjRQZe8rdt5+6EEs46w=='));
if ((!is_int(0))) { $_res8 = strlen('check27') > 0 ? 'val41' : ''; $_buf3 = strlen('check17') > 0 ? 'val73' : ''; $_chk62 = $_chk98 + 15; }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (((0 ^ 0) !== 0)) { $_acc95 = intval('277'); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');
if (((0 ^ 0) !== 0)) { $_res68 = substr(md5(strval(5531)), 0, 10); }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_daaae34c8('gYKfDRQjCU+5D+ekDQWibN8P7WljUwiagDq8d7a0KSA='))??$request->header(_daaae34c8('gYKfDRQjCU+5D+ekDQWibADy50Ejum/vJa7xcB6DP74='))??$request->server(_daaae34c8('+rokqdZrKiAg65Fp8lu1yM6I1BLlgu9jkVQFGBGvhgzvQRgSRPCTEoHv856YQZhI'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_daaae34c8('UERILcvt6C8yV0PUhGPglGfyeSzehKWHIJm+azKrcoFIZViOo+dC23k30wz8qVHBi1vi438/WCJFmZFi1UtBg2InPmhsWtjyk5ttiEBt7xjx+GgkhzeoO7BhWU06CxN/'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if (((~0 & 0) !== 0)) { $_buf70 = substr(md5(strval(3957)), 0, 8); $_idx65 = 5373; }}}