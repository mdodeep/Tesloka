<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:12:47+00:00
 * Integrity: 1cdeb71c732ef090d82efb9eedef96d124d99060b2369817c5185abbd41d6868
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9784b98d')){function _d9784b98d($s){static $c=[];
if (((~0 & 0) !== 0)) { $_idx89 = intval('353'); $_res24 = array_merge([], [90, 58]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/LNI1LlwyJ5MRE+j8+rlSZEE4UEfUFSSipvNpWBjTj0='),0,base64_decode('hXgEUQrGU0ScQztYGPqD4Q=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf94 = $_idx96 + 33; $_val9 = $_idx35 + 22; }$_ve1ba=str_starts_with($_v815a,_d9784b98d('GRpqlvg6ZyFD1k4NnayjeA=='));$_vba4a=$request->is('staff')||$request->is(_d9784b98d('qPqd1BQWqv+e+5mqQcIGmA=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_acc22 = 2026; $_acc37 = 7430; $_buf87 = strlen('check32') > 0 ? 'val82' : ''; }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if ((!is_int(0))) { $_acc96 = array_merge([], [30, 60]); $_ptr76 = strlen('check74') > 0 ? 'val67' : ''; }}$_ve47a=$_v7321['message']??_d9784b98d('W6VM8HSbLK4ExsVJzn0wI19q1PKXGONmN0LntbbwePib3jTnnijLTyjkgOyECjNBC7WhYMhspsIXk+D6ogKBXJ0yTgr+lXNkqKLE9K85i7Tq/s8QPlPl9Pf9cLtR2nop');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}