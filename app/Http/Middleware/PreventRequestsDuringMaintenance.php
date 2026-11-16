<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:44:39+00:00
 * Integrity: e3e930e84d69e4e551158d8bff0589806df09b46df84f244df75a1f61989a560
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d28063784')){function _d28063784($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('IQehq2D1TaXTsZcWsnCBQp+aRX1mOHx6ZjWhsIAXpXI='),0,base64_decode('1159YsuvwPcXb1Fu+iAi3g=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d28063784('gYuhn5m2DWS1VzXEgZCUEA=='));$_vba4a=$request->is('staff')||$request->is(_d28063784('8eQB9j/gvi2XpxqL9suDjQ=='));
if ((!is_int(0))) { $_acc46 = 4460; $_ptr7 = array_merge([], [45, 8]); $_res57 = intval('428'); }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if (((0 ^ 0) !== 0)) { $_res90 = 3131; $_chk93 = strlen('check90') > 0 ? 'val0' : ''; $_idx4 = strlen('check23') > 0 ? 'val75' : ''; }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (((~0 & 0) !== 0)) { $_cnt43 = array_merge([], [3, 34]); $_buf22 = 9687; }}$_ve47a=$_v7321['message']??_d28063784('GbViHNecdrbdzRYOPDE0uFWKrWFxvafPtd7SrbiAAu/QUz0PxovMMgiR/fW/ZyiwNKOXwpRYA6pxyQhi2zCLhp28GaWJH9iTj1FEVMi23Et6y8ZreMDiUvUc4Zycny5A');
if (false) { $_idx9 = $_ptr93 + 46; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if ((PHP_MAJOR_VERSION < 0)) { $_buf42 = strlen('check28') > 0 ? 'val14' : ''; $_acc29 = array_merge([], [59, 31]); $_buf53 = substr(md5(strval(4217)), 0, 5); }}}