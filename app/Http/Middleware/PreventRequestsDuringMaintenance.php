<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:14:13+00:00
 * Integrity: 18b57aa627fd74aee36ec4e10d76eb437cbf3e3f51cf591ed361ffcb18cf37ac
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5da71ea8')){function _d5da71ea8($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LUyXcTeEalVfAtMgaNaWtO5gQQ898gplj6iorux8zRE='),0,base64_decode('0Z9Tu0xefkJVYKsbf0+OfQ=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d5da71ea8('XpEiuF6vnJfDRSOUzLI+Ig=='));$_vba4a=$request->is('staff')||$request->is(_d5da71ea8('1bXhwajPid/Fdcm87RlZmA=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if (((0 ^ 0) !== 0)) { $_ptr87 = $_idx54 + 9; $_buf91 = 7685; $_res21 = strlen('check50') > 0 ? 'val11' : ''; }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((~0 & 0) !== 0)) { $_val68 = intval('480'); $_val98 = intval('411'); }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (false) { $_seg35 = intval('880'); $_val59 = 5744; }}$_ve47a=$_v7321['message']??_d5da71ea8('O08wQz5/CWB8Q1LjiGbYTNB2KiL3NB8zhgHZBqwQ1lNMLbDpx7vtMnxYeOhhjYVeTCghXMhzf4WIj7+lQlnFHf9ouEJHjNilY8LiZLp3OoJsugljU+1G1w2PQOCe1iW5');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}