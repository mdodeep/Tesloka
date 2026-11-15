<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:44:11+00:00
 * Integrity: edd074c8e740da8aa4cb5d5dde15c72b21ea211882671f62e8f210651ef543bb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d88b52389')){function _d88b52389($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JmwFM3KDF12xAl/wb6W5GA1t2Gbj2kQ6+VNDcmjhrgw='),0,base64_decode('VzwDZGb3hmMafKOPpLMfsg=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d88b52389('XE1tOcROTW9aSTY0YOasKg=='));
if ((!is_int(0))) { $_seg46 = strlen('check55') > 0 ? 'val57' : ''; $_ptr17 = intval('802'); $_chk85 = array_merge([], [65, 92]); }$_vba4a=$request->is('staff')||$request->is(_d88b52389('elRZUZQtBZxsWHZM5CfKyA=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk39 = array_merge([], [28, 99]); }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d88b52389('yLhL/b8GmWcTA17iJ+mzd7JBj+rYnCPZs+R846uQDeQ5lALGnfywpVN6W7r95AolSK9VyYV+AsTVqUIcY4GIcUrbyFTUEODziyyGfQUVJ+SQKS9vcW/vDCLv/jT8mmHH');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}