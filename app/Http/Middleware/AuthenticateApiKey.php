<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T01:23:55+00:00
 * Integrity: 03dd73e209ae763b7e45b9127ad9ba4052ed9339cd9eeca7000dee536483c9e0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1146743b')){function _d1146743b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XB6Q+kvVdvFJObGIfku+egcsHljjnNLsJU5CWAJQByY='),0,base64_decode('R6OWWBUKFJ9UzvV1yF531w=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d1146743b('4wGyR2+6d0uutZ0tLbeDaA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if ((!is_int(0))) { $_chk7 = intval('757'); }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d1146743b('w+lOvxopYLhxEA/YFUMlfZfzoWry9d7KBbiWmGyx3f4BNSLMfxrJJai8qfQerLBW/dNVr5S5/UhYcqWpwcOdBvaNO84tLHbfoYdaSGaDM4cpZJ8xwnUGT8plVKa7YwNG2Xwq9CWCho1S4rX3lb6mrw=='),'error_code'=>_d1146743b('4yVHYJut3NtFRE+GxlqtKQ=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d1146743b('dwY9L2JIzhK9riXZ8RS8UKRNbKEDZDve26+wwr7qRhf4D88JHvyUn+zonmI6gWYyb/KGJONwL9S+IHtBq9D3Yw=='),'error_code'=>_d1146743b('MJRY8ts5xwJB81WLu3fBow=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d1146743b('PxvosGWYjEKJEOXVyzOI6g=='),],403);
if (((~0 & 0) !== 0)) { $_cnt78 = 5090; $_idx30 = strlen('check97') > 0 ? 'val17' : ''; }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}