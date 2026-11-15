<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T03:52:06+00:00
 * Integrity: b8aabd027ec1f419dc5f633661aea2ff50061edb89673b2f38ddd91efe947ffb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d51780f09')){function _d51780f09($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('l+lsTZTbcacOIwYB4SJEHho34ts6JHMKnNhJiTN0YMA='),0,base64_decode('2aCkJDJbdLolOhnlKlovVw=='));
if (((0 ^ 0) !== 0)) { $_val64 = $_buf38 + 22; $_buf41 = intval('463'); }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d51780f09('W6M+9VVmllNoCXo5kUKOSQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (false) { $_buf32 = strlen('check39') > 0 ? 'val64' : ''; $_idx55 = strlen('check97') > 0 ? 'val0' : ''; $_acc23 = $_tmp65 + 81; }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d51780f09('MdEg9DMBwFldCiw6Kv9LyrLPvbdpc0PB/QSOpcgqlVoHfxA0zdRvS0U8IFusqkUXwxrLbM6qoE441OJ3xUAsLyl7uQhcfebcpli1Pef8U+AWMEr8w/hVHKzjiEEE+uqf9pX1/kJXIGi7ccohpNpVOQ=='),'error_code'=>_d51780f09('BuaaoTMJQn+qEvhfFPnY0A=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d51780f09('7bjdE99BF6KzKoo6r0B6gNCplvpQ8+hAmidYz3rkrQsz7s0yxt6FCqvZtyEiE2HdAZ42jfMLV/JKViKsK51GVA=='),'error_code'=>_d51780f09('eddHzmreP6UsFWlljWFAZw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d51780f09('Qf8wtlS1aMailPDX4yL8xA=='),],403);
if ((PHP_MAJOR_VERSION < 0)) { $_chk33 = strlen('check30') > 0 ? 'val37' : ''; }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}