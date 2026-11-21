<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:07:23+00:00
 * Integrity: 6ddf30c2954cc18d609567e44b6e5fe500e15c441b7a83fbd1c4b50943b36e64
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6cdd1258')){function _d6cdd1258($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4oicDcAe7Q/2tfK5VaoF9DhHGmpvEdIBJEGwCYRRtEU='),0,base64_decode('8M+X9gMprd8EndN9wA7YTQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_chk40 = $_seg13 + 62; $_res30 = substr(md5(strval(4307)), 0, 7); }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (false) { $_acc63 = $_chk27 + 68; $_chk73 = 5600; $_ptr40 = strlen('check85') > 0 ? 'val30' : ''; }$_ve1ba=str_starts_with($_v815a,_d6cdd1258('KoNxAOXS9NhXb0kqzcMIwg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_chk79 = 3243; }$_vba4a=$request->is('staff')||$request->is(_d6cdd1258('trBQxKscwLjklzIzvkaWkg=='));
if (false) { $_tmp10 = strlen('check74') > 0 ? 'val21' : ''; $_val23 = intval('883'); $_seg28 = 9359; }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if (((0 ^ 0) !== 0)) { $_tmp61 = 7697; }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr45 = array_merge([], [31, 57]); }}$_ve47a=$_v7321['message']??_d6cdd1258('q3zwyIoiAqnkeqCTbO2WYsbLs/bJxhjHztEBP5Bewvqgdlr5EvKh8KvV23anfzCTqboTb3NbJzT+dyc5ZVEi6QpS5BTRSKDa/cT98kSnlh8MUXwrHHNASL/zrJRZC+0y');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}