<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:12:53+00:00
 * Integrity: a306dc4c788eb6eaa4a2c3f208f02c66d20642bbc37e89cdc2c9154b697bd1aa
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0bf2dd11')){function _d0bf2dd11($s){static $c=[];
if ((!is_int(0))) { $_seg20 = intval('732'); $_acc11 = array_merge([], [69, 47]); $_tmp97 = $_tmp85 + 92; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('DScB7cnAGyoPkLtSUlPDE0My8ZhBLB8tS58mWaqJf+Y='),0,base64_decode('XsQ4lCQC+yr2BTQyI8ydhg=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d0bf2dd11('kywDzlTWhc7vr+gix22Unw=='));$_vba4a=$request->is('staff')||$request->is(_d0bf2dd11('Az+YGg7+/tYIc2ay0Anb+A=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val35 = strlen('check25') > 0 ? 'val59' : ''; $_buf30 = substr(md5(strval(3097)), 0, 4); }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if ((PHP_MAJOR_VERSION < 0)) { $_val10 = 8760; $_val14 = $_seg37 + 48; }}$_ve47a=$_v7321['message']??_d0bf2dd11('kQ1IOO+NC6wWf7iWRZpuK7LN+Qts6Ty9ln/PZuT1TTE0aPTtn0vEhAotEw4l4lMh3ETvSKNBH27UVAIkM7ofF5Bv7Rc9N1ZdOCLu5MNIndOUfeQBS8bB6VgsEWIlAL8k');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}