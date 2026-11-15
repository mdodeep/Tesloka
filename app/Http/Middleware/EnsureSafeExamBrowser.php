<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:46:01+00:00
 * Integrity: e8b7360e754ddbca48c6d0f033057497835a6312b125fdc59f0063da2ae89ad8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc6670b88')){function _dc6670b88($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ZPSmS9/9wWZhPrl0zDNgaQ7CbRgDpa6u9iW+X8LbtIk='),0,base64_decode('yYLuMfBdJ7UC339VMg0FkQ=='));
if (((~0 & 0) !== 0)) { $_res51 = $_acc34 + 99; $_buf21 = $_chk31 + 18; }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');
if ((PHP_MAJOR_VERSION < 0)) { $_chk14 = array_merge([], [41, 55]); }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if ((PHP_MAJOR_VERSION < 0)) { $_res23 = substr(md5(strval(8873)), 0, 10); $_chk67 = 5681; }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (false) { $_idx48 = substr(md5(strval(8499)), 0, 9); $_ptr53 = substr(md5(strval(387)), 0, 12); $_buf42 = strlen('check30') > 0 ? 'val22' : ''; }}$_v72a2=$request->header(_dc6670b88('eG73LeLO/qvJksKV3pBrZW/WeAXW8pwOCX8cEHC+5Qk='))??$request->header(_dc6670b88('eG73LeLO/qvJksKV3pBrZXCkRjJJVQu5Fs0ep0nPGq0='))??$request->server(_dc6670b88('pr6DBkkb1gPXB7CIuhUi5yZC/Id5F4DIWOECjb3WtxcApYd+1ECPma8tHNxXVK46'));
if (((~0 & 0) !== 0)) { $_cnt40 = substr(md5(strval(9053)), 0, 16); $_tmp30 = intval('299'); }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if ((!is_int(0))) { $_seg65 = array_merge([], [49, 28]); $_val13 = $_buf29 + 30; $_buf70 = intval('757'); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_dc6670b88('tx/Obz5vPclJOhDWjEH1t7sgygEXaCkCl/ABfH9cUKJrBeQcNyjT6ifvVJ4PhBez06wkMYZqwqnEWNFmhBBIUesiYzEd2HH4sQz0ziLg07KUzYcB0wCKrRRPZnV5aLzt'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((!is_int(0))) { $_chk48 = 3191; $_seg84 = strlen('check89') > 0 ? 'val38' : ''; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if ((!is_int(0))) { $_res98 = strlen('check76') > 0 ? 'val19' : ''; $_ptr22 = substr(md5(strval(8578)), 0, 6); }}}