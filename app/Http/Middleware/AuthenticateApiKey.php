<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:46:25+00:00
 * Integrity: 5dc076367dca2aca8216f163718bf09dc1ac6d174d5e80534a1715a9a20a58f6
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd4490574')){function _dd4490574($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4XhWneLbIbP87qJZacMseuqNPv3/MrNF0r9cXkow1h8='),0,base64_decode('ssd5l0kA3szyvFA6fMpIwQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_dd4490574('pGVPi1FzRRK0LcAcZmJs0g=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_dd4490574('8ergW7/6Z+xgV53OHaGy4cksVrNb/xHLLHj3aTJF6zgNaX8eJzoUdKCDsNq01L7ce0xgBeUZcusPBsAj85Nfx3UA+q4RIeN8kMFVIvkqFpPLYwShwnwsEYFgtUJnUGhx5+nAw7xvPwe92jzSNqm0Zw=='),'error_code'=>_dd4490574('jzqe6x+fOOM2D86Eolbxuw=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_dd4490574('/EUcFdyspfpxm/MuJXsKRBbR82a2xfjThynEiZqWWTZQrxIvWvpdGLD4PBGNRS7p5c0Is2NqEz6UbJLmVKKJAg=='),'error_code'=>_dd4490574('r2BLxCtiwjsfsOJsA8oOFA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_dd4490574('ujd+NWQ7uUxHyLQ9wf4JGw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}