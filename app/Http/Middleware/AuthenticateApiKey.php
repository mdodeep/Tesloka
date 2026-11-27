<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:40:07+00:00
 * Integrity: b239a7db52f17bafea0fb8b829fbb68615a5cfb91459cf3afc5ae4b62e0b43b8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df4cfe802')){function _df4cfe802($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ui9O3uaHsUz5KVUmEYthduRoypbpxqQ8dJkb9vKRMj4='),0,base64_decode('5oC5ssB7KSgBisd7IWhfaA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_df4cfe802('42wOTpqSKnpj+DYn4j2ftw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if (false) { $_buf15 = substr(md5(strval(2735)), 0, 8); }if($_vb5f7){$_ve285=$_vb5f7;
if (((~0 & 0) !== 0)) { $_buf79 = $_tmp70 + 86; $_res69 = strlen('check20') > 0 ? 'val17' : ''; }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_df4cfe802('UCYnC7pIRMZupV94PblBTSLyLuVJ07+lC0tasrDxGxieVv/yL65jgL/D7SplW6p9CviTx6WF/y6crdym7N8dfLUZVj68D5jg78tmqQJZnyCW7EpDJFPbu21MJVfD0J7c/iWfeBbxT+oXJBFvSAKl3A=='),'error_code'=>_df4cfe802('3j6MympGjFzbudzJa0jxDw=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if ((PHP_MAJOR_VERSION < 0)) { $_val63 = intval('215'); $_acc2 = array_merge([], [7, 25]); $_res93 = 9137; }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_df4cfe802('tDxfrETX82xCSW961df63zAdQof8IH39VpEaFIZSGA/wOi5eZbie6oO9a4mIriWYco4NtG57KuA9ZMcQ3v5rDg=='),'error_code'=>_df4cfe802('cM4LSS18O3dk9a290plSng=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_df4cfe802('rDyRKFUDNLnEVVW8RzyEAQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}