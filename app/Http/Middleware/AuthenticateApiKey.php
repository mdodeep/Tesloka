<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:50:06+00:00
 * Integrity: 6fee3fd511e40e63d81a3969f04fe7438d544c4954970045fffff7363671dd5e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d48ab84c0')){function _d48ab84c0($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_idx81 = intval('931'); $_tmp10 = $_seg52 + 47; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('yPdDO52DYeJys5sVbisgiz5UdScFLLlo0FXtAWZndFo='),0,base64_decode('mUiLLBSDmYskUEzh+gV9qA=='));
if ((!is_int(0))) { $_cnt89 = 9546; }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d48ab84c0('l/ATM5CF1QFOdVrWVqlqeQ=='));
if (false) { $_chk96 = $_seg58 + 38; $_chk55 = array_merge([], [28, 77]); $_cnt23 = substr(md5(strval(7046)), 0, 5); }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d48ab84c0('9Go0COw6aj6MAqRKDldd0VOnzCfKwuKbWSZhHm6WLlnSxX+cGv6HWfUYkP36qRYoVkr0CtDxSv8jR+5c+p8XRVhBC1wB89gzIsQi3WPUBb0Ytx2p6s+JgIKBLXxpy/0OAyKiWJ4Yq02Q9bPLztec2Q=='),'error_code'=>_d48ab84c0('Hy3qcuf+j4vHyUvL7689Hg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d48ab84c0('Fbby/5ujqLSXOUc9hjN/uYfalsELldQpxlJfQlrNxqK5L0Caj5nK8DogTVkGYx7xT6AwaLK27cngUHrQKlpV6A=='),'error_code'=>_d48ab84c0('oMAE9Gy4MTzcR2DIq5bVQA=='),],401);
if ((!is_int(0))) { $_buf14 = intval('52'); }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d48ab84c0('5AeH3sIipkYrXwY8pwNxVQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}