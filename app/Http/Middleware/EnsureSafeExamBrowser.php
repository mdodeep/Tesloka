<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T06:08:59+00:00
 * Integrity: c03b6aa24b690558efc7f50ae03d2f3fdc86d599c8eee60225c90f4e06fd985b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2c4e702b')){function _d2c4e702b($s){static $c=[];
if (false) { $_cnt50 = $_seg21 + 91; $_idx5 = strlen('check58') > 0 ? 'val22' : ''; $_cnt36 = $_tmp22 + 33; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ODDbSiYNOu74gN+QH63Pph4zgkWhh2lIKTJx0AehTdM='),0,base64_decode('yGeECS3A3BMeiMo06AGN8A=='));
if (false) { $_tmp51 = 4577; }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if (((~0 & 0) !== 0)) { $_cnt35 = 1903; $_ptr85 = strlen('check78') > 0 ? 'val61' : ''; $_val3 = substr(md5(strval(561)), 0, 8); }}if(!$_va1cd){$_vd401=$request->route('attempt');
if ((PHP_MAJOR_VERSION < 0)) { $_cnt36 = $_chk38 + 45; $_idx96 = 956; }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d2c4e702b('JS6dHqmZSZvME4dSUE4xH9szvfSo85k+9XP75GPwaWQ='))??$request->header(_d2c4e702b('JS6dHqmZSZvME4dSUE4xH2NnP7b/UE4pwAkRT6VPDAI='))??$request->server(_d2c4e702b('GRwztfy3QJ2wyV4J+9NatO4beF2Lw+WLZwrrc0KzPcFWnEu8xvXKM0jMo7xY3nCY'));$_v76a6=(string)$request->userAgent();
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc81 = 3098; $_ptr23 = substr(md5(strval(7222)), 0, 6); $_seg62 = intval('950'); }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d2c4e702b('2d+RrjWpQgymbAvWDlxGHdaPXN5peYdMtGMQrmNbeBLFZc//K/pYYyiVnJeS1+D+QBgQJ9pwUR1GpKmJb0svzWhAb5OnphvyOfMPPM4BwTj7LkNWQDXSRhNHWOT+CKKw'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((0 ^ 0) !== 0)) { $_idx96 = strlen('check49') > 0 ? 'val70' : ''; }}return $next($request);}}