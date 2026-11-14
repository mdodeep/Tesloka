<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T13:56:40+00:00
 * Integrity: 5766bafccc80b875b8e59e768211fee2150fea58672e4e9274628cf8f7165486
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_ddbeac48b')){function _ddbeac48b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JHuTuHDhgVdClT/eJAQSpITd7vPb8t9ONTxJ8RbtCvo='),0,base64_decode('iVyRxQv/jklVFSxj4HdWjw=='));
if (false) { $_acc79 = $_res6 + 48; $_idx44 = array_merge([], [41, 53]); $_cnt7 = substr(md5(strval(3095)), 0, 13); }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_ddbeac48b('M8U8aeE0hABE8+8sM4wgUg=='));
if (((0 ^ 0) !== 0)) { $_acc20 = array_merge([], [77, 87]); }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_ddbeac48b('8LgpiLxYV35koeVAqLPSmRj9I2ccrPmTuf/7exPTlcEcoOh9jJUqPGUpQu/E6GTUtRgUf3KB18GfqvcjG1k2RWadrjKB3O1pkKGhb4vJTNEvagUyCmsrxH56nGUbVnF8LYgHWZ4/+/3u3/5YyBs88w=='),'error_code'=>_ddbeac48b('8WRF+SiJC98Z0AuZ/dEkiQ=='),],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res65 = array_merge([], [1, 22]); $_tmp70 = array_merge([], [67, 81]); }}$_vc9bd=ApiKey::findByKey($_ve285);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc32 = intval('337'); $_chk75 = array_merge([], [23, 36]); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_ddbeac48b('Z08WE3E++eFzzsxJTa9RUtw/sEG0FDMubgb1XWeFwDQd1ffKVrvnfrAFjlLR/HZnha6trdfSML8pifVtA56oPg=='),'error_code'=>_ddbeac48b('lGp4F2s7IkKRVgYxCuEKhw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_ddbeac48b('otOREesJmeuKZw81jOMpKQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}