<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:07:23+00:00
 * Integrity: 6ddf30c2954cc18d609567e44b6e5fe500e15c441b7a83fbd1c4b50943b36e64
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d46dd4783')){function _d46dd4783($s){static $c=[];
if (((~0 & 0) !== 0)) { $_tmp58 = $_acc32 + 13; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qqwoV4Kwg8yPfJMiPLCJHbU++2AohC56xBscm6iA7no='),0,base64_decode('BbQVZfWz7ta0mP+HsBV0Sw=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d46dd4783('sLgtizIErWV65hesQAeaDg=='));
if (false) { $_cnt97 = 632; $_acc87 = 2961; }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d46dd4783('j/vsBV4VTw7MG+UZofIh4XKQMUqyoHz7l8q9ljgL1mVm76AIMyguX9sgzgWLhgtPHMF6ZslfVYHxIOf3Qdwm9UDspgACHwBNGRjB+63Z7lJ7vEk4te0rnRo4u9wgkdiB/2dETBl0X9IlTaWCIB2I4g=='),'error_code'=>_d46dd4783('uWjwfFC7hSPAwjw8ykaq6w=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d46dd4783('tt8eqCysY/AJt0F7/nXvklHb60Q+bma8l9e2G8Z4iByWaBF5vGj4r1sF7aTG3rLC/UbqmWmRda/0cSC04vDT0A=='),'error_code'=>_d46dd4783('3SnvEvOjgfEt1ZfA4it8hA=='),],401);
if (((0 ^ 0) !== 0)) { $_idx63 = substr(md5(strval(3470)), 0, 15); $_tmp57 = $_idx35 + 47; }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d46dd4783('C6/a/80AO2U2HciRBtDOlA=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}