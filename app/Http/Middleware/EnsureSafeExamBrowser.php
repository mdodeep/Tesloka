<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:15:02+00:00
 * Integrity: 3fdd4e81275382375f811facecf8d5cef5cda7157404fa8661a4104594859a25
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d78e3db32')){function _d78e3db32($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_idx85 = $_val67 + 79; $_buf5 = substr(md5(strval(5801)), 0, 8); $_idx79 = $_ptr42 + 14; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XUfj3mZ2wbSxZDsBzIzoHl/KAESwKZYEdwoXjrTfuyQ='),0,base64_decode('bIg03e1aSfMFoTnGcZtfyQ=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (((0 ^ 0) !== 0)) { $_buf33 = strlen('check41') > 0 ? 'val83' : ''; $_idx6 = $_val19 + 38; }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d78e3db32('PraV+fuHUalXUbObjKGjD5GEm7KkcGSBT9WIwgyocu4='))??$request->header(_d78e3db32('PraV+fuHUalXUbObjKGjD4sTJML/Tw9F3j3RNiD0eFE='))??$request->server(_d78e3db32('QTtqk5ZDCMaDGk+avhaZMA1a9CL1rR9E4nkTDjGcsf8jQ8PoAqadreboRjhWN1Jk'));$_v76a6=(string)$request->userAgent();
if (((0 ^ 0) !== 0)) { $_acc81 = substr(md5(strval(5349)), 0, 12); $_chk28 = 119; }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx8 = intval('589'); $_idx3 = $_tmp12 + 17; }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d78e3db32('JGMMKFDlF4Lh85Pv7+Y28qLewsnjrFIt33WrW0nux/Pu9t7ujPkrLoyo2pbTVPe9sVnJGX+8dQvPtvWXnxu3mZ+A21WTVP8RVfS+2gopUGr5bp0AgMOQn7LH0VNklLOg'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if (((~0 & 0) !== 0)) { $_idx31 = intval('912'); $_idx77 = $_chk90 + 71; }}}