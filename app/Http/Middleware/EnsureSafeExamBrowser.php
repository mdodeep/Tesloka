<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:33:03+00:00
 * Integrity: 5825c4b58f1782521538e33f3b1d0d4d3ae088ba26ed6da8509eef8d6ee93945
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d70eeed3a')){function _d70eeed3a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('bU5JXJjtkuP9nVC7VFcviMPQoL3JVPRuDr5VdUjocHM='),0,base64_decode('sML1CVhwXiMaIoKjZe93RQ=='));
if (false) { $_res82 = substr(md5(strval(5417)), 0, 13); }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if ((!is_int(0))) { $_seg31 = array_merge([], [72, 60]); $_buf14 = strlen('check9') > 0 ? 'val83' : ''; $_cnt20 = substr(md5(strval(278)), 0, 11); }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (false) { $_acc67 = intval('632'); }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d70eeed3a('kZKc57/d0uGgaY5ZpPlZ4dEw/1B9KPECTIiUS/NhIK4='))??$request->header(_d70eeed3a('kZKc57/d0uGgaY5ZpPlZ4cags8JrlLwqNQ2PTleihM0='))??$request->server(_d70eeed3a('GcB5KvIFAjrqJyhEpOx8pGB5z9HC6h5JJV0potVkaCSZ64y+HX+IOnXRBt78wQ7y'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if ((PHP_MAJOR_VERSION < 0)) { $_idx10 = $_idx24 + 78; }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d70eeed3a('4fvydq3wpb/zAk8YbACiDDvUDAxzBAOTxLlSqvuBdhejaQVzoUAtlNJbPuLUKHdUYKxcDkG/j0zIU5uEnTBKOBEmMgQ4eKYl+DOPFgEOdvRo2xjN1aL35ZU/Pl1gpf4P'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}