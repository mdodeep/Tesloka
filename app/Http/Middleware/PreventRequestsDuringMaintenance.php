<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:28:09+00:00
 * Integrity: cece1f09a4c104ca687cd4df334946077335ee48ea708f4c43c98fb7ad43a1fa
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d69160901')){function _d69160901($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hHDi736PJIW5ewU8oMVJIOb2Q6QzMqRkcmGdkH36S5A='),0,base64_decode('7gBjVTX8Gj0ZWLyV43jmbA=='));
if (((~0 & 0) !== 0)) { $_chk54 = 4383; $_ptr46 = substr(md5(strval(7802)), 0, 9); $_seg1 = substr(md5(strval(55)), 0, 7); }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d69160901('SNObg4hI0sOprwf8wKhlmw=='));$_vba4a=$request->is('staff')||$request->is(_d69160901('ce+zI1EqwWsBQKFlYnLs2A=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc17 = array_merge([], [94, 76]); $_res55 = $_seg65 + 92; $_acc86 = intval('89'); }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d69160901('uynzYlgfVEfvhwzLVajqtQVeiSN0TOrWyc5KaAm1czj1Mh2CiS7u+lwODDKBnXHgzJDzaZTlY1sNf9VMy0yEZV4n842pPUVbR8TWgg5ey5gqgsbOFy8QZOMgzmQpFxtl');
if (((PHP_INT_SIZE * 0) !== 0)) { $_val10 = strlen('check96') > 0 ? 'val12' : ''; $_buf96 = 3335; $_tmp26 = array_merge([], [76, 1]); }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}