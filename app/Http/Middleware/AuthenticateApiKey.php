<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:12:03+00:00
 * Integrity: 827550dfee9bb5c5eb345a2beaa3a4c0ec71eb2e8d7fe8a9ed3961444bdfc0f5
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dcd25212b')){function _dcd25212b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('sFi1TTrbwnvCALiBl9XDSe34Cm/z9ktb0tJqCz7KHLM='),0,base64_decode('AUvS4FnlCjb4btX1qWeGTQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_dcd25212b('V7L/TvZa3BOgM0WXKoQd4g=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_dcd25212b('PgzGSTY/4E1HXSWiCoablc14ufFxIh4FShPaUWgOLan7LvcZp8VbzYCxD3OPalLO4BXq9oMinIMPuhgZj53csf0G2K4LS9SyPX/2//Ww84yi1QU2XqNwEJmIhao+FNGn5mbV52QUTH5n7ATo63jKeQ=='),'error_code'=>_dcd25212b('l1/HIPPDN9zJTSYPU/6SdQ=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if ((PHP_MAJOR_VERSION < 0)) { $_acc81 = substr(md5(strval(2256)), 0, 16); $_ptr67 = $_idx28 + 99; }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_dcd25212b('6x+onCUZKSaXv9gv4D+ZlR0I6JspzmTYZvHdcpkf5QDSweHBimrXqub69GP3ksO7aZO2IoCSiZAAXJu+eX0/BA=='),'error_code'=>_dcd25212b('Rqf8wzRi8qlMRdCR44L2YQ=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_dcd25212b('I5qyp3mj3nw1NGt1WUXkLw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}