<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:03:53+00:00
 * Integrity: 72d6c2a8f55830d6dde7c4fc6854949f9ed50a91f2785841c39a708f3a0fa05c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d488a0a46')){function _d488a0a46($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr13 = array_merge([], [39, 82]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('tc8270FeMFlwgYlSlJLD8evC2eaMPYfw2k2x7LdKk94='),0,base64_decode('LnX8qnUtQUnj+QKFaKjBrw=='));
if ((!is_int(0))) { $_tmp19 = strlen('check96') > 0 ? 'val91' : ''; $_ptr28 = intval('891'); $_val10 = intval('596'); }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val67 = strlen('check81') > 0 ? 'val9' : ''; }}if(!$_va1cd){$_vd401=$request->route('attempt');
if (((0 ^ 0) !== 0)) { $_chk63 = $_ptr76 + 33; $_buf86 = substr(md5(strval(6513)), 0, 8); }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d488a0a46('awVTDt3c5ZgbHOQRMPkTSxclvyPlInVvNb92q2shJTs='))??$request->header(_d488a0a46('awVTDt3c5ZgbHOQRMPkTS4ECNAuiE8I7PGSTWLt4/Mc='))??$request->server(_d488a0a46('nqGQNXD4IkOJL6NaBIt41Nj5eBMrZmP7TU2FZg2xiMx9JD1ddbfvmogN3FvgufHd'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d488a0a46('LinsOx1ziDiOB4Ij1iAtX1pSBVvgX4tRqfaJHDnHrm9TQalPE0IyiC2rM6vZo9qkXt0Jr4vbuEYAWIN5Sv8jhPTgpyNm356GiY2oHhLIO/mwOhZmaaabVgITUCnHAs7L'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}