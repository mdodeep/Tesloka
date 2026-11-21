<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:15:07+00:00
 * Integrity: 6cc87d6018f5bf82d5a78b1fa5688d482f0fd4102a645a3588fc6ea4e386a0c1
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dda635e1e')){function _dda635e1e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hsCe94znUVEPlqMpj8qSPb6N+xyd+nTJ87eektNEeq4='),0,base64_decode('9Fbq2XVBy8a2Otpm7SjsaQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_dda635e1e('U6KkhrXskW8UiJJrSpr3oA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_dda635e1e('7epek+lgn3hxQ9pEB4hthYBOyjc10sYqMIRftJ3lUOwPhKleyeqvppy1jGOJhEu1C8yfwHEgPTnppuk4d/08NY4+nPELY3c8UH5/fHjn4Qdwc8+KZh+7FkF8Cua8sds5RiZXEJMTTd/vEaZB4XeJNQ=='),'error_code'=>_dda635e1e('GFhb/pEBK/dOSLXQfdMkKQ=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_dda635e1e('albTNEnjhzfzZqdzakQ0TB3CyhoAgX8TCjEECkIFDw+jTI7p8Bp/gak9vbHA4VU+RxPyUtF7BG+VExMM8QaFwg=='),'error_code'=>_dda635e1e('MgmakyLpzcn6un40D67toA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_dda635e1e('GtP0IDjThHoX96Ei/1nqBQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}