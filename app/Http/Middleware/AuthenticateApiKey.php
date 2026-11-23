<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T05:03:51+00:00
 * Integrity: f5a75bcdc48148c8724fcb4a06b85088073bf6fdb5c9c28924b472633ae79374
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d49989919')){function _d49989919($s){static $c=[];
if ((!is_int(0))) { $_idx94 = 7287; $_buf27 = strlen('check83') > 0 ? 'val28' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oj82BZgLXeEYY+obZ7g/jQOC1hRpJBPc/tceZpmlblY='),0,base64_decode('KUroWhC8qy5bTs+D+KgBHQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d49989919('RDi8667yVHz0Sw4yfhe5kg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_tmp23 = substr(md5(strval(1351)), 0, 15); }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d49989919('kKU/pSfGwenB3417MvQTVV1tcBiy8EeXaiCS8xP4IExsNUyEIcfrqbB2weTJPnZ9bVnWvSY2bTL6dVjtiDlBqCQrwobjN6AolMA5yVnh8xyZx1ipmfdNhkjs7bTuniSV0rwgr193ABgnZerdo4Vv9Q=='),'error_code'=>_d49989919('wWQ+DXspylBceJlkVgJ/2A=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if (false) { $_acc12 = 8327; $_acc52 = intval('1'); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d49989919('x3s+PfaGe0qBGzVzHUghBSK1lOQlZD0IctOizLI8XWDnYxvRxaIWCeGHxn6aBw9iKBwGUD8fuyKtxm0LskfbFg=='),'error_code'=>_d49989919('8kVlU6/0gDpApNw/qU1CMg=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d49989919('yMgHJ1HmDvREyYVXZTlIUg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}