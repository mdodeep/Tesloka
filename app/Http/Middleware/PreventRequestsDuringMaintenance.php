<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:37:40+00:00
 * Integrity: 6cab5f32f79b494a98da1bcfce2bcdb278ce6ee5bc6f7ac0c8dc7ba17c6d7508
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfc5f833f')){function _dfc5f833f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mExqB8W0Qb+Zlgaf2IRw1RNWd+XDuvw7DZiNCx3b/X4='),0,base64_decode('u2u/SO/ksdIj54qFZayhXg=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dfc5f833f('X6F/Fccnbm50YMu1+uGBfQ=='));$_vba4a=$request->is('staff')||$request->is(_dfc5f833f('nLHFVjlEX0vMHcGTUhjucQ=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (false) { $_chk72 = 1245; $_idx88 = substr(md5(strval(463)), 0, 7); $_buf0 = strlen('check21') > 0 ? 'val7' : ''; }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (false) { $_res89 = intval('966'); $_acc87 = array_merge([], [26, 37]); }}$_ve47a=$_v7321['message']??_dfc5f833f('B/ke+/xaUuoDaiJ1rC8Vk8vN7ixNCeF15QGk3MpjXmht8nd1degh7KyU6jfPIIZQiYpqZM54/kigxTK3k+OSiaWqtxq4aZGM3+4IaqEju7/BzOOUsdVajnVUBVWRV1mf');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}