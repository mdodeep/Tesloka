<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:53:12+00:00
 * Integrity: b59a44e39efc32b80f54030355ee759724e6d68712aa09d15db462d921406c9c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de7abcf1a')){function _de7abcf1a($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_idx51 = substr(md5(strval(7072)), 0, 7); $_res53 = intval('457'); $_tmp32 = 4546; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('nJEt7QTsPhE4Q/9Fs9M9XMQWtB2u495Et96yD7yf9Ek='),0,base64_decode('zZ0FciMcAzOVVJ1qtQEdhA=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');
if (((0 ^ 0) !== 0)) { $_buf59 = 7233; }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (((0 ^ 0) !== 0)) { $_acc37 = array_merge([], [76, 98]); $_idx9 = 6529; }}$_v72a2=$request->header(_de7abcf1a('aSvY3+lysPG66lbplVeBOvrW6/v0yEURSe93B6TrtNQ='))??$request->header(_de7abcf1a('aSvY3+lysPG66lbplVeBOsPTSIPBglpXaoR3x96iKOQ='))??$request->server(_de7abcf1a('Mh4mXRbWiGvkPzT795bMGe6h8kY6/eFoXV/76MIPkgUryAwhGjb0IUaVlGyaT3YO'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_de7abcf1a('sDMoTgiEU9iJ8CqSnTXnvsB60dE2im9rxebAEoP+l3DnlDZ2BLSYQC49c8ACJ7YhzSoyxtxBGPcaMDrnivgwAyvkqJQp2z1Yb+DeicGoMuXBxQxXVe4P2VimUq+cSbFm'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((!is_int(0))) { $_val83 = strlen('check27') > 0 ? 'val83' : ''; $_acc27 = intval('972'); }}return $next($request);}}