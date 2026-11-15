<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:50:48+00:00
 * Integrity: da2d8e8e7eb35502158592fc7f4fb96f0713033f54d4fc850a96d2de053c79e8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d74a99b66')){function _d74a99b66($s){static $c=[];
if (false) { $_chk78 = intval('308'); $_seg24 = substr(md5(strval(9511)), 0, 15); $_tmp2 = 5113; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Phem6B0Owy1wXkuNHel9r7uSz9YbWiHhj/+FZrfcM8o='),0,base64_decode('s45uGxLLkKPf05NlVH0mUA=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if (((~0 & 0) !== 0)) { $_buf92 = 4959; }}if(!$_va1cd){$_vd401=$request->route('attempt');
if ((!is_int(0))) { $_cnt86 = array_merge([], [80, 50]); $_val98 = substr(md5(strval(6164)), 0, 4); $_val72 = array_merge([], [28, 99]); }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d74a99b66('vAeyRU0VkqC0Ot116bD2p2+sILTUpTpd1TD3I5IU0uU='))??$request->header(_d74a99b66('vAeyRU0VkqC0Ot116bD2p9tJPNS81gUCtMezrgNUF9I='))??$request->server(_d74a99b66('4z/PyrRJhpfkwgRfVfaNLAVEjqqG4tXN4tMa6EBiLZZq3WJ4EKU/nl6J30HZeT44'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d74a99b66('yCUF8N/M/U/Xo3UI8KO9T5htYimggVjeDZhr3Y0pCrvR6ycM0UKgtKzIMSV/9+QjmVb8wBxWQ3octI1ohhNmDHal9itNMkDUFgJ9QjqrWfad0fbxbse8cMRrdHTEX2n7'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}