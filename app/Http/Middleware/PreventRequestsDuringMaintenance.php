<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T17:19:42+00:00
 * Integrity: ce5546e3b06a0b51173f929af6400b66496593d860eae83b4b01ecf9fcf73e14
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d859e8041')){function _d859e8041($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt32 = intval('839'); $_ptr97 = intval('243'); $_chk35 = 3250; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('y+Ap1VkxbolwdG74rg8ibwjbhjDHUgn6gJRmMbINyLw='),0,base64_decode('O5HSlxnxIUNW4tp+m3t1uQ=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (false) { $_idx92 = substr(md5(strval(3936)), 0, 9); $_acc30 = array_merge([], [87, 33]); $_cnt20 = strlen('check23') > 0 ? 'val88' : ''; }$_ve1ba=str_starts_with($_v815a,_d859e8041('gCegqO++AEnwQDFiA90uDw=='));$_vba4a=$request->is('staff')||$request->is(_d859e8041('xVq/KPeGBNbr2yHpJQGn7w=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d859e8041('lj+WhZP/OvY4baddNsI2iqCnHQPjnFckJwjsNdech+hARhnvFhC/YsqkfIuimC+OhaIhNYiRX/Mwt+AfdO42aLZyrLnYpLj7g6QZcZwQkBumwyugXrwxbo/gtqcxaFxz');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}