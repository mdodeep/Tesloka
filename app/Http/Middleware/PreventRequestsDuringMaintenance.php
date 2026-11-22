<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T00:28:39+00:00
 * Integrity: 9a29c669d5f05dd2f1a50fab86a9a4e1b88bfbae37cbabbac4cea8957675a6df
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d27f1df0d')){function _d27f1df0d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LnpW5w0iRNp9aEWVWupRLkBtxoXUd7RUNOuIOjUpOaI='),0,base64_decode('RgMlK/b0OJ3Y8sj0VCTpmQ=='));
if ((!is_int(0))) { $_idx72 = strlen('check35') > 0 ? 'val72' : ''; $_res76 = intval('649'); }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d27f1df0d('5Mi8OMzcpDQ7isDetJddpA=='));$_vba4a=$request->is('staff')||$request->is(_d27f1df0d('jSG/FKFtbdxsUnC6jZkT8A=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if (false) { $_seg79 = intval('850'); $_acc72 = strlen('check30') > 0 ? 'val13' : ''; $_ptr43 = substr(md5(strval(4987)), 0, 15); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if (((0 ^ 0) !== 0)) { $_seg54 = intval('221'); }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d27f1df0d('KnOVhNiocrF9Ta6VLD7y+iX2hAWuGEVNkXKCACDGK9g1C+f60VxyeRjUhuqHwVdFhL0M0u2bNt9DhvU6dr9XDgncOzYRI6ui8EK9Vfd6lgjxu9JxH8kEwUylMjnOpFyU');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}