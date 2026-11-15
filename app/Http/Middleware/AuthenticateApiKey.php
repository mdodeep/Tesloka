<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:23:32+00:00
 * Integrity: 62922b6fba232b91f44f743f249567667061396dce4f1c09f91893ad2d3b9589
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d14ba01f0')){function _d14ba01f0($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_ptr43 = substr(md5(strval(9798)), 0, 12); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jtg1cVaEUaoEB5lB6LaVb5qxzUWG0ukeXFwEdaqoZ7Y='),0,base64_decode('0faWNFiNqJ1w6MmAB0stmQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d14ba01f0('TjlF8EN5qxfFBCmQ/wjMyQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (false) { $_tmp5 = 709; $_cnt51 = strlen('check59') > 0 ? 'val51' : ''; $_ptr47 = intval('204'); }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d14ba01f0('VPDPCAJ8C0r01yeSNA0op3MHzNw/7unpzMizqG275dbyS3Yzl9EdmtpoR7WNjNbJKfCLJNA8Yn3lIIPbkPwyaF6ikdL32pt1Adae5pyFMgdfyA4RBLbBiTcH1eYHkXC3mIr0bil7XGJDKso1+2u1GA=='),'error_code'=>_d14ba01f0('AhQtv8V2ld/4vwemR7Rm5A=='),],401);
if (((~0 & 0) !== 0)) { $_idx9 = intval('82'); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d14ba01f0('/ZqCnVfc+j2XksAVZTRe6btu40P2Mp02cLWu31YcjvzdknOmuXyaXgSYE2imhq570sPo4oaWFv7hoxJamr7VWQ=='),'error_code'=>_d14ba01f0('Nbqd/sSXWglaT72FT5t5bw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d14ba01f0('8Rns1d1Y0OuQNTBcNXhMtQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}