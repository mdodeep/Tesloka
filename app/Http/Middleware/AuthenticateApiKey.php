<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:01:07+00:00
 * Integrity: 732d13c17bea258201492d7d488181ebc396461ab0f6b9e4f8436f39a34f93ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df5e098e8')){function _df5e098e8($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hc4Lb262/+pP7vYYtC4rwkdBJyvCFgRQemK+dSp4QrU='),0,base64_decode('XP1Fp2rzTDJA43vOkg4lQA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_df5e098e8('uybjA5iV7galaYa9DOu+mA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_df5e098e8('pUXCfOyqs0dUlbziFWkBaJiAAIH+jP+eUc5PUGvT2Xc3TeT5lVurdyFJFao9LTnAIBYILlWKowO6Sc6t+59GuGBdZ7rDzbd78MjN50UV4Na72d6OqMNHIIJTsxpfJZjWqC7H9Eug03h7aD4CYCcfXw=='),'error_code'=>_df5e098e8('QOy6ZAPBgraYrXBek0cwTA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_df5e098e8('SGbgGpH4k+FZxAd1fK+TGCF14FilNWHCWVUmwEukDfQ/tN5K5dz3bchrMtxRysagmjmguCOHZOjLvWH6LjVoWg=='),'error_code'=>_df5e098e8('Fpgtp4wpNi7YR7QIcUQIcw=='),],401);
if (((~0 & 0) !== 0)) { $_ptr90 = array_merge([], [93, 79]); }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_df5e098e8('mrTfmYxBoc8RpKjnNisYYw=='),],403);
if (false) { $_buf14 = array_merge([], [81, 52]); $_chk17 = 7487; }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}