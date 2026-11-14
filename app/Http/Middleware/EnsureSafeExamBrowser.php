<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:45:28+00:00
 * Integrity: d8d50151664cd5e9171c0571737d97b823c3a8834b7a545e6b01c8ef1911e6de
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d59fc680f')){function _d59fc680f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MwZ7uSDINE0p6c/IEAIQrO1cPKrJ0jWWyE6KhmBD15U='),0,base64_decode('IcZhAUDewiAQ+yPZvfJM/Q=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (false) { $_chk69 = strlen('check51') > 0 ? 'val91' : ''; $_val83 = strlen('check15') > 0 ? 'val9' : ''; $_tmp29 = intval('967'); }}$_v72a2=$request->header(_d59fc680f('6ozrjlu/ElxubRogns/Bl8/Aq6Vbc8/qwDehtneMU90='))??$request->header(_d59fc680f('6ozrjlu/ElxubRogns/BlwajM1VlNbSgYNuxMFAVpQs='))??$request->server(_d59fc680f('d0L4bx3PCnwj7MOPkxXDlBJBeLifF+dM+JCS5KbNrtXa3LrFR5eBENpZFDNGOJWa'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d59fc680f('wVvOux3F/RU2r1rOLNdgn48Czewsjar+GWWe+pjCv+tX5MiJxs/rM+5pxkIeu7o1rdTsUiJut0yo2WdJ5TN0DEnBpVah/Px1otu7mxlcO4VYYYTg6SeaxIOipiCsjw5Y'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((0 ^ 0) !== 0)) { $_seg53 = substr(md5(strval(6541)), 0, 13); $_cnt25 = strlen('check71') > 0 ? 'val80' : ''; $_tmp36 = 3615; }}return $next($request);
if (false) { $_res84 = substr(md5(strval(6179)), 0, 4); }}}