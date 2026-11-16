<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T06:08:59+00:00
 * Integrity: c03b6aa24b690558efc7f50ae03d2f3fdc86d599c8eee60225c90f4e06fd985b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de0447b5a')){function _de0447b5a($s){static $c=[];
if (((~0 & 0) !== 0)) { $_acc90 = intval('56'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4nVH4J/MQbIurXa262tzf631tt0TIPzF/9BS0WTFBFg='),0,base64_decode('rwHpgctoILc1KMdPbyKMRQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx51 = substr(md5(strval(9762)), 0, 12); }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_de0447b5a('JQlFaKuiGKRwb4gWmCop4A=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_de0447b5a('iL9vXVfS04raDhtEk0iTd9TWrx695AL1TWKl2icnozDh+5UkwpzwzpafrTe7zuTHstkJNE+vKuioAmNpsa8DZtMBSl/qdMGQ3YOfsb6gaF05V9YYaDRlnjdcvb+7ynXB0eS6xGaNHr1IIRn4R07TLg=='),'error_code'=>_de0447b5a('1/nSMprYLp2cV6CX+gfH4g=='),],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk40 = 153; }}$_vc9bd=ApiKey::findByKey($_ve285);
if (false) { $_res7 = substr(md5(strval(3274)), 0, 12); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_de0447b5a('LwKwpt71I6nfGEEMcerVHPxJfcU+DoRjIhhhH9L158IvMEfiLfUZAVZpE+D2AY6y/KrNPVfQhuEKEljQ17eNgQ=='),'error_code'=>_de0447b5a('NLteR+M1Ij16rXIrsWkxGA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_de0447b5a('lBllIab1Cny9qBEroI9xEQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}