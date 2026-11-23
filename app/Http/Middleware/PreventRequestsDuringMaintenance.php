<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:05:06+00:00
 * Integrity: 16904cd816c3c21956ec405fb921e49fb870ec1c25916fdd9d72495d85d174fe
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df359de86')){function _df359de86($s){static $c=[];
if (((~0 & 0) !== 0)) { $_tmp14 = intval('920'); $_acc15 = array_merge([], [34, 55]); $_buf40 = strlen('check17') > 0 ? 'val43' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('koznoE/32oDL8u3av8XGJCqsvWjFNZiWRozOUYbYvds='),0,base64_decode('V9akC8yGN9ynDWfbb8f/xA=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_df359de86('j1HCMoOEr5LOwuCAWDZ3Vw=='));$_vba4a=$request->is('staff')||$request->is(_df359de86('HyCX0K2dCb9KcMCZv3K5Zg=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_chk71 = array_merge([], [91, 35]); }}$_v7321=$this->app->maintenanceMode()->data();
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt9 = array_merge([], [68, 72]); }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (((0 ^ 0) !== 0)) { $_chk73 = 2277; }}$_ve47a=$_v7321['message']??_df359de86('FdYou/4AnAqQ2ih+3XqZWJJJHq6TlM6GKDqrnn0X0t6zomi6KcJ6GdlKm6GssPA6YsLhZGNyqkyS15HLD/6bqEs/zt3o255xT9StqHnh6gfxPWB+erHKUV7Yg7Fe9RZ0');
if (((0 ^ 0) !== 0)) { $_tmp48 = strlen('check49') > 0 ? 'val26' : ''; $_ptr88 = array_merge([], [5, 56]); }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}