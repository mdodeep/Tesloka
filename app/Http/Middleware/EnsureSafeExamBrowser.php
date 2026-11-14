<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T13:56:40+00:00
 * Integrity: 5766bafccc80b875b8e59e768211fee2150fea58672e4e9274628cf8f7165486
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d56831c4e')){function _d56831c4e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('nzz/mwFY+eenjzRVFWU+7vBD9VTmEckMmlPAuwqSh4s='),0,base64_decode('vtuOWqqCPUskhxJi7w9Shw=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');
if (((0 ^ 0) !== 0)) { $_idx80 = substr(md5(strval(7539)), 0, 9); $_val45 = strlen('check71') > 0 ? 'val14' : ''; $_idx63 = 2233; }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if ((PHP_MAJOR_VERSION < 0)) { $_cnt42 = 6053; }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp47 = 6871; $_tmp8 = array_merge([], [47, 75]); }}$_v72a2=$request->header(_d56831c4e('HI40j6pK4AUV/QBq524Cqemik+wTl7WOu2++XJqL+Xg='))??$request->header(_d56831c4e('HI40j6pK4AUV/QBq524Cqei8eIcGAsBHLv15NJKRupM='))??$request->server(_d56831c4e('cd0oq1lpBz7fJkaXOrwkJ5qxEIgVD1/VSgEXH61txzIrfGE3LEO2X4nxpTISaMv4'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (false) { $_idx66 = 4655; $_res20 = intval('618'); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d56831c4e('aAT3R9mFX4liZgOtMkgyoUfQNBgOS5awmODD3KSlrd5AP4RR4px9LXnmJmlFzzjf9KpyU2WoBlanA/T/cNG8CpYqugX7Vdg2eoE5fWz8RqjQRfTuknuVtx2W1eFjE75a'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}