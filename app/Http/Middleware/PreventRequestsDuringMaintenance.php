<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T06:42:17+00:00
 * Integrity: b463240aa949947e7c92e3e9a908659b247406f07d59d5f537c214f6a4e9553e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2b965cfc')){function _d2b965cfc($s){static $c=[];
if (false) { $_chk36 = array_merge([], [76, 86]); $_buf18 = 6511; $_cnt30 = substr(md5(strval(6517)), 0, 12); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2kPetcMmQSw9rElh5j3j8hl0YFPiwSdhZzA0b1ZVdUE='),0,base64_decode('FxL1VSn+98gpBU67kEO9dg=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d2b965cfc('yQHMbtOea7jV4uyWz7Xdyg=='));
if (false) { $_seg14 = intval('784'); $_cnt77 = substr(md5(strval(7370)), 0, 9); }$_vba4a=$request->is('staff')||$request->is(_d2b965cfc('gEEwEzxIiPMWYAbrok1S3w=='));
if ((PHP_MAJOR_VERSION < 0)) { $_res85 = array_merge([], [71, 65]); $_acc48 = $_idx64 + 35; $_acc33 = strlen('check16') > 0 ? 'val90' : ''; }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (((0 ^ 0) !== 0)) { $_ptr98 = array_merge([], [17, 87]); $_cnt51 = array_merge([], [99, 77]); $_buf12 = $_seg51 + 30; }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (false) { $_acc29 = strlen('check39') > 0 ? 'val27' : ''; }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d2b965cfc('m7YEz9f1QwJGohg6SsOPFLQ4wsZsUsRPYE9P+eAbie5PE67gNdg6sNDFF5a8CyZ0sa+AWX5i5xTOCB/1L8Lm9DT+Rp+ncIxEGj4aH5jG+tcrzGkIRvQgd0rWN/QusplB');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if ((PHP_MAJOR_VERSION < 0)) { $_ptr47 = 7535; $_ptr19 = 6701; $_res69 = $_idx67 + 71; }}}