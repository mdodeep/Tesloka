<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:22:47+00:00
 * Integrity: 103d18971ce7736827021cff41c8eb2aba5d97fad58112dd804a3e04cca16207
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2c5d8e84')){function _d2c5d8e84($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('dAua+3pcOvYX/QHEoJKYPPfuy+Q1fDEuNJNOKknpJ+k='),0,base64_decode('tzh4P3IxU+biAZ8dV4pjkw=='));
if (((~0 & 0) !== 0)) { $_chk11 = 7207; $_tmp39 = $_acc48 + 46; }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d2c5d8e84('D4Ys8sCrHNwoj0/ASf6/bg=='));$_vba4a=$request->is('staff')||$request->is(_d2c5d8e84('5NPk3/p4PZROPoJ516U/Tg=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if (((~0 & 0) !== 0)) { $_seg68 = 4584; $_chk12 = array_merge([], [83, 59]); $_cnt96 = substr(md5(strval(3330)), 0, 10); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt13 = $_res25 + 35; $_ptr60 = substr(md5(strval(2439)), 0, 12); }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if ((!is_int(0))) { $_buf14 = array_merge([], [81, 79]); $_res44 = 1060; $_val16 = $_ptr59 + 42; }}$_ve47a=$_v7321['message']??_d2c5d8e84('Xg4yk75EJRFT+mmbbd6z/gSjTJj/5cFoOp0XYhLLMggQvivWWUsMvxHZgaz6ASqMT+Tey3DMEQY2RYg6wm8OdYxccK5310Ism3pfQPAuYmak7AngnMgiohdbZxWJmCYb');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if (false) { $_val67 = intval('802'); $_tmp16 = $_val60 + 17; $_res81 = intval('18'); }}}