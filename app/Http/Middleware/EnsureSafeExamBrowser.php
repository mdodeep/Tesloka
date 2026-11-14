<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T00:14:22+00:00
 * Integrity: cba49dac84e23e46259554721a02318f0fec97670fbdd18307dcaddb2439029b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df73198cb')){function _df73198cb($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_res65 = intval('381'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1rfaUZZr26ig2dwqCBSX6ZOT34Fibi8Q/FZrAuv9KCs='),0,base64_decode('oNsIi9Q40o0o8Ud2qpJZ7Q=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp12 = substr(md5(strval(383)), 0, 15); }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_df73198cb('VRplOmoQBPZtKrO7Jfy++T6rHtIr6pVzZoKqvDZBjhE='))??$request->header(_df73198cb('VRplOmoQBPZtKrO7Jfy++YgA3ZzK5IcblEOqFPimEek='))??$request->server(_df73198cb('SYd9IO5FQuxWKZyeOy/PoX/qIpmvWTDSwJ0kTZzZgbBCrh3hTM7uAMOrk5sG01CQ'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp50 = $_ptr62 + 70; }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (false) { $_ptr62 = array_merge([], [26, 13]); $_acc30 = array_merge([], [41, 28]); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_df73198cb('xwFuWzXGQUJOKlBtrjz8iE46fIePnwpdWHITzAHJ+YcfD7v/KOs7lj4RmkaqtJp8+44zSO2mq+VPg4LRvEKrALUmyUePWVojn+zfBVbQ7gI5cqhdEiqfZ8oKMx+hAX1f'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if (((0 ^ 0) !== 0)) { $_buf42 = $_tmp45 + 52; $_ptr8 = strlen('check24') > 0 ? 'val53' : ''; $_tmp95 = substr(md5(strval(9344)), 0, 5); }}}