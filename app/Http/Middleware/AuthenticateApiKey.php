<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:24:07+00:00
 * Integrity: 3f389135bae9bc9d8687dd0a86e767fd91c57a5c6dc1ad9f62845c658358687c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de123d77e')){function _de123d77e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ecBjPboI3PXxDI5oBfAsKVNWr584ajSvYwzj8leJfgE='),0,base64_decode('yb+ybB48LNXpmw5NYGFDwg=='));
if (((0 ^ 0) !== 0)) { $_cnt63 = substr(md5(strval(8550)), 0, 9); }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_de123d77e('cXS+FYAom4qVnQlC5HJY/Q=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_de123d77e('RxrMULoH1vXxgdrCYIQ8FLpK3RTkrOWz6W3oRQt6OPaD+63cAoW18+35Sth4bNcZDCS/Boz8ekBXYcBVcuzdGTHsf036ri3r7VsTlvjzTi4M+baMFTM07QXZ+FrEqWdboaYWS166c3JvwiSZhcDaxQ=='),'error_code'=>_de123d77e('0PYKttkstBeFkMYWv9lKnw=='),],401);
if ((PHP_MAJOR_VERSION < 0)) { $_val28 = strlen('check83') > 0 ? 'val77' : ''; $_idx87 = strlen('check99') > 0 ? 'val8' : ''; $_res63 = array_merge([], [95, 1]); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_de123d77e('NS+KxSV8yo9y2esEJSP7um36eMAKHCW8CFXbWpzpBpXu7SMEALQnWK08m7TA343iBJuXSSt60vtFfLRYDcwdgA=='),'error_code'=>_de123d77e('fyOBPdN6uMHEIa6Uw+B3VA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_de123d77e('n16Pual57Hl/BXbj5HCriw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}