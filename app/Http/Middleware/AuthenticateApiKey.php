<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:34:32+00:00
 * Integrity: 80d18f91ce749c2ca9f6e303c5ac5e4bf9c6db968e683006649d7eda41df6409
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d41cd5a4c')){function _d41cd5a4c($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_seg71 = $_chk28 + 83; $_seg98 = 9435; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('t+ecpjS0q0fwl70Tp+/nk6FcqW0Slp3gs7Z4V72P/tQ='),0,base64_decode('qG7ZOtjikf5WLhIkjeOHoA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d41cd5a4c('3uXfC06vwzYLbd4wUq71Yw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d41cd5a4c('zKUMibI+BRy4zWY5WSEIJq/meopFRfnmfoVVBJ+XbX7KCBJ2gHpdWBKoluAmq5liie3+o6+7Qu+p57g67TBfOaAOeo9ULylXuPJ7lEbhMxqL1h1kqlM9j61O/U1R8mGm1s1ipxpBvaxNKeQiZwhGag=='),'error_code'=>_d41cd5a4c('Ha+YlhkBtuDP4a5veC/DSA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d41cd5a4c('tYy/ABaU93zDXe3EzlmUfuCXjipbzzCGfPHlryZEY/no7iNR2ovjM9WqKUdnWmSo3XFsY74j/9ZBSXoJmeg+Mg=='),'error_code'=>_d41cd5a4c('8/vY/OS1SwNHwsUexwOfqw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d41cd5a4c('zWAd8eGwFa+Sr/3AsPqrmw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}