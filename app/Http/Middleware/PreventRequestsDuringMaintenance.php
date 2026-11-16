<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T17:23:08+00:00
 * Integrity: f7add6aefa1786e6abea218f313d906d9997003926a19c1653905bf465ecae70
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dda2acfee')){function _dda2acfee($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ThHJOJK8KSSWDlEiHKzSU91Ze2tIbW7EUZa7HxA00Dg='),0,base64_decode('+CiaBdPETKxqVash3ZOVGw=='));
if (false) { $_acc83 = $_tmp15 + 25; $_cnt75 = array_merge([], [90, 19]); $_idx48 = $_buf47 + 95; }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dda2acfee('czDSEfmKzG5/mPGHr+PxOQ=='));$_vba4a=$request->is('staff')||$request->is(_dda2acfee('vIo5H4kC7zk+9+3E7IgiJg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_ptr79 = 755; }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf90 = 5167; $_acc44 = intval('655'); }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dda2acfee('VzVq63Yd+me5WmIAX+e2JQ8pWza4lZVOXHTsOInNrLc5+ndAWfPcUlvJH3UVBcKpUmbR5/N8huyT8XwB0KFnFQK2Z3Y0U+jLv/ShDfi2MYAFOAgR7qJR5lojIqlcRgb7');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}