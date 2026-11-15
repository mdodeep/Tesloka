<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T03:52:06+00:00
 * Integrity: b8aabd027ec1f419dc5f633661aea2ff50061edb89673b2f38ddd91efe947ffb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d08e3a4b6')){function _d08e3a4b6($s){static $c=[];
if (((~0 & 0) !== 0)) { $_seg6 = strlen('check31') > 0 ? 'val74' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('crwAGvzDYnR2DDHtCePjCwVpjoiNZM/A+KqeSXjEB14='),0,base64_decode('68PWZ3RA/5tTX3229qzv9Q=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if ((!is_int(0))) { $_tmp0 = substr(md5(strval(2987)), 0, 13); $_val42 = 1775; }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d08e3a4b6('rWSx/wKLlHi18yCFk+opAshDjlddy+PDHzrbz8in/q4='))??$request->header(_d08e3a4b6('rWSx/wKLlHi18yCFk+opAobkw2+McxA18c0WV1NCUpI='))??$request->server(_d08e3a4b6('jcb3VBDdJ4mIrkKfCdxZZAHf9jc1CpSFgAJ67azNq6fDgBpPsE0epLmE0wqgheb0'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (((PHP_INT_SIZE * 0) !== 0)) { $_res43 = substr(md5(strval(9759)), 0, 9); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d08e3a4b6('J5O6PS/xUtYXHEfc/YBG4l65MQd06MNW5ttbEbmdhhpRkFWXHQ//YpxDg7puEBbEPVqymVNCogUlcXRlJyeu/D/thFvwoF6S9GNVWwFp/6uocYK+0BWnJ6EqObvDBKfc'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if (false) { $_buf79 = $_res73 + 51; }}}