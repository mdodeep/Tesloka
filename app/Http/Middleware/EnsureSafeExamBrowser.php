<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T22:15:49+00:00
 * Integrity: 47d77785b7693bde6cba101c75e2ba7d523281db8c0cc0ae672ba68f3781cb9f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db304828a')){function _db304828a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VYMMYZecYtP0VoJY9kKpeiZV1+HMSZ5mNOeXLtYL6W0='),0,base64_decode('hBTOvPSAOQIDpIsY/7LTRg=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if ((PHP_MAJOR_VERSION < 0)) { $_res41 = substr(md5(strval(7790)), 0, 13); $_seg65 = substr(md5(strval(3152)), 0, 12); $_acc83 = array_merge([], [25, 79]); }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if (((0 ^ 0) !== 0)) { $_chk98 = 8950; }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (((~0 & 0) !== 0)) { $_seg78 = substr(md5(strval(7254)), 0, 5); $_acc93 = intval('48'); }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_db304828a('NcJBanwAxrDQZW8JaUE558EVBQUonTXbCJN+pVogRwc='))??$request->header(_db304828a('NcJBanwAxrDQZW8JaUE55wvZ4em36D+EtfBqPd6kB8k='))??$request->server(_db304828a('6ATKx6ybLoAeXzqHdZdfYkzJZd+rXryVJf5EUTLex+ENTU4uOCjZOTTSSqpbJYUu'));$_v76a6=(string)$request->userAgent();
if ((!is_int(0))) { $_tmp59 = array_merge([], [66, 31]); $_res0 = array_merge([], [19, 85]); }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_db304828a('sl5bcgk9iYwNHum5Pl1OrHa9P8PwywEKpELX5OqjlNhxDbegHhWMI0SyYysmPlLxL70jM6nT68+oPwWluOzcFpjVl+S+hEMNNg0Av8d6+g0IIkzSsPyTY4+ZnuLlC19t'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((~0 & 0) !== 0)) { $_tmp86 = strlen('check56') > 0 ? 'val16' : ''; $_seg66 = $_chk8 + 8; }}return $next($request);}}