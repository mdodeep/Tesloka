<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:15:07+00:00
 * Integrity: 6cc87d6018f5bf82d5a78b1fa5688d482f0fd4102a645a3588fc6ea4e386a0c1
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dec66f2d8')){function _dec66f2d8($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XLHoLTDHOrGPZ+OteH3BkYbVqIQt++wxC76zGsiYCLA='),0,base64_decode('HPyCTOp1NwLwlU3HuUpphg=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr14 = $_idx43 + 70; }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_dec66f2d8('6ZPZTSWJx7JYrjCcpRr2TAPsYnSy6iB0iVhAFICqO9E='))??$request->header(_dec66f2d8('6ZPZTSWJx7JYrjCcpRr2TOKN7eGMe8qGzhSQNNn9Cns='))??$request->server(_dec66f2d8('13zl88lhXajT34es5mhKjxCZv01WULLO/CGdAwFjjA8++feZX066wjMWI3sG3ItU'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx20 = intval('224'); }$_v76a6=(string)$request->userAgent();
if (false) { $_tmp26 = strlen('check85') > 0 ? 'val59' : ''; }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if ((!is_int(0))) { $_tmp67 = strlen('check26') > 0 ? 'val23' : ''; $_idx8 = substr(md5(strval(6962)), 0, 11); $_cnt0 = array_merge([], [95, 47]); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_dec66f2d8('+FpQ9Z009Q2tbPcpw7Wn5LD11UIn09HHaEAnq3NgILKYPQRpVByYrPc8z1Y2PWUpXxddH2flXi4kEQND1/B+jpxZQxQfVM0ceAh9qoT98XLnk6igCwk1otS2rmINODag'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((0 ^ 0) !== 0)) { $_cnt42 = intval('467'); }}return $next($request);}}