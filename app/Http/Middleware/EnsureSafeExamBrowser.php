<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T07:59:36+00:00
 * Integrity: 74cfb1c25712ae88dea77b8ced4b20e6d077872b406f2c9f7a388b25212eef21
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d09989dc8')){function _d09989dc8($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('T/ArDhtpc6pzS/qD5zVx0KWgba03aVXdtxyfN1SPH0c='),0,base64_decode('rpcGRBl2bGhJEiHDe9YQeA=='));
if (((0 ^ 0) !== 0)) { $_ptr56 = substr(md5(strval(4826)), 0, 9); $_tmp72 = substr(md5(strval(8791)), 0, 5); }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc1 = strlen('check3') > 0 ? 'val36' : ''; $_val49 = array_merge([], [18, 92]); $_cnt29 = array_merge([], [74, 82]); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d09989dc8('5oiXvDFzyDPZRskx/BI3IZyMgTGvRJZC3/wz7VWLg6A='))??$request->header(_d09989dc8('5oiXvDFzyDPZRskx/BI3IWzraJyTA0dhVOn8uNvdtyE='))??$request->server(_d09989dc8('HxhThSib2Hmif2ow9nXx11X4sOo7z1sLjzft2cA1acPOeZ39s6keNjx6rnEQQXo3'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (false) { $_acc46 = intval('179'); $_chk33 = $_acc30 + 29; }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d09989dc8('WgIorv/c7HFHkJiYCy6A7C3W/knDd9roIoINsW3ynztVkkZmyrdBr2MlE4HtgHNcIfp5shCL3XebbViAziG5S+i85ehsQDcoWC43+MaFyhkxmTz6kf5CMxm8q/aibZ+Z'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if (false) { $_buf36 = strlen('check25') > 0 ? 'val51' : ''; }}}