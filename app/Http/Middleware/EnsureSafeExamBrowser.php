<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:46:06+00:00
 * Integrity: 69b98c86e8d708190ec7678d1b73bc2ecd4b70cd054ffeb1223678ae90de05f0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d36cd8207')){function _d36cd8207($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wrLPshNeUfEkkgrA30IB1L9OrALZ1ynStzOKWzF7wj4='),0,base64_decode('3vomn90mhcHbedzTbnfuPA=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (((0 ^ 0) !== 0)) { $_res73 = intval('713'); $_idx67 = substr(md5(strval(7937)), 0, 9); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if (((0 ^ 0) !== 0)) { $_buf67 = intval('35'); $_chk6 = 4840; }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (false) { $_idx50 = array_merge([], [18, 67]); }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d36cd8207('B1MdpHvfv760JeDt0NkQaMvVR0zjDNzdKbFVSIFcgKw='))??$request->header(_d36cd8207('B1MdpHvfv760JeDt0NkQaGy9vyiB82Flk1mwn1Ji2CE='))??$request->server(_d36cd8207('eXv9YN+jaWrXNevYuCzXNiG2LoJWT+PMso1wdbLuDqWu7PjlTuyBxT73GwpC6ih3'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d36cd8207('vL8kj15+iuD3ImhAQVqsiVIcb7icEuXa5ZNDCWCc4nW/WRuXwYJhCafQKx4Z07VGxaosHH7Peq0xV8cdqjXK+Ail7SCM/aG1cTXGdn3AWEC1p9SKyk9HL+IYsSCJmtoH'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}if($_v72a2&&!empty($_va1cd->seb_config_key)){$_v94c4=$this->sebService->verifyRequestHash($request->fullUrl(),(string)$_v72a2,(string)$_va1cd->seb_config_key);
if (((~0 & 0) !== 0)) { $_val25 = $_cnt67 + 70; $_idx99 = strlen('check54') > 0 ? 'val54' : ''; }$_v9ce4=hash_equals((string)$_va1cd->seb_config_key,(string)$_v72a2);if(!$_v94c4&&!$_v9ce4){if($request->expectsJson()){return response()->json(['message'=>_d36cd8207('vXjOPxoOYCAF+FuGTKmECFRwb1Pcv6OHG7B25QRX/rdAvMK6QzlbwFkbNv63kzh4G769DTlSmDyW6qqyyUKWF1LBcaXPx8ADVYaa4i5LhioybdUG33c/9olZxQAMbij4'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((0 ^ 0) !== 0)) { $_cnt81 = substr(md5(strval(4713)), 0, 16); }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp95 = $_chk8 + 47; }}}return $next($request);
if (((~0 & 0) !== 0)) { $_seg31 = substr(md5(strval(9772)), 0, 8); }}}