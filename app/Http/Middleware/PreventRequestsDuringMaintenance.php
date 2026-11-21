<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:32:20+00:00
 * Integrity: 478a70a0514ca4b030cf683c5df8b15a4375318e1e3ca01055d8d807b786e642
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfa944312')){function _dfa944312($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('m2uZrVZhwAzuSRAog+ybPriBnENMpveA1NWLLJ9S25A='),0,base64_decode('9VTqIfuHn+pJEP9XffWl/g=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dfa944312('LAohiYJflw2c0ophM3jPWQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg39 = intval('73'); $_seg83 = strlen('check39') > 0 ? 'val33' : ''; }$_vba4a=$request->is('staff')||$request->is(_dfa944312('FeP0tevVCRkXp0zqdiywvg=='));
if (((~0 & 0) !== 0)) { $_cnt6 = 4480; }if($_ve1ba||$_vba4a){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx95 = array_merge([], [37, 13]); $_tmp16 = substr(md5(strval(1036)), 0, 11); $_val21 = strlen('check12') > 0 ? 'val5' : ''; }}if($this->inExceptArray($request)){return $next($request);
if ((!is_int(0))) { $_idx21 = $_res81 + 8; $_acc64 = intval('368'); }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if ((PHP_MAJOR_VERSION < 0)) { $_val31 = 5972; $_res81 = strlen('check37') > 0 ? 'val12' : ''; }}$_ve47a=$_v7321['message']??_dfa944312('DopeHPfMb9AZJ4vb6jwIfaMRjLT00iICYW8DfJu9lkhPW7o9G+wHnSFAJqMvOJ9FYOYo9hBCDMtmMMTYw0WIVZRWxUKl8HseUqG86ph9wFqOzTRdLziDbu++FZmr0ZJ4');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}