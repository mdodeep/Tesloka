<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T16:48:11+00:00
 * Integrity: ab8dcbec4f381a73c000a540f5da45639f9c8e40ebcc1ddbc948e203c6c604db
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc050ae37')){function _dc050ae37($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Gl/yIGDwAcy3mr+Mac837WM+ZBWZT8lK93vbvPkQGa4='),0,base64_decode('1l5i9kRMbcbqx0f3WYkEbQ=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dc050ae37('9JlvnouxCWzjjhk4IUC1oQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_seg60 = substr(md5(strval(3325)), 0, 9); }$_vba4a=$request->is('staff')||$request->is(_dc050ae37('9fDp1xXdzoG/rALnZgSbyA=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if (((~0 & 0) !== 0)) { $_buf13 = substr(md5(strval(1672)), 0, 15); $_idx10 = strlen('check52') > 0 ? 'val54' : ''; }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if ((PHP_MAJOR_VERSION < 0)) { $_buf18 = 7882; $_tmp41 = strlen('check21') > 0 ? 'val15' : ''; $_val50 = substr(md5(strval(5813)), 0, 15); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dc050ae37('dg0nWZD8lHL43V79OT4kjp25hTfoLQLbSuxBvBSBLJQDzbERl4sFzbtZ6QQet5ZzTqAYlnMBqfSGtBmDav8w8eX7LxPFbgr3GBJVJfDCgU/60Ef4pHvCDzOlYV/MuNmr');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if (((0 ^ 0) !== 0)) { $_chk84 = 5147; $_chk37 = 8853; }}}