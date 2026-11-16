<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T06:08:59+00:00
 * Integrity: c03b6aa24b690558efc7f50ae03d2f3fdc86d599c8eee60225c90f4e06fd985b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_decb517f3')){function _decb517f3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('QAPMLcn29DgsQT6qdMeSNV/jDcqmtCCA0J1S5CWVWUg='),0,base64_decode('9GFglAYCmOzyzcMvUkp8XQ=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_decb517f3('tlxTy7o8I7H0gio5SJ3zLQ=='));$_vba4a=$request->is('staff')||$request->is(_decb517f3('fn1EyxVXvz+oT1eROHiSTg=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if ((!is_int(0))) { $_val79 = 5457; $_chk78 = array_merge([], [53, 55]); $_seg13 = substr(md5(strval(597)), 0, 14); }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_decb517f3('kEErS9l+a4pdlnAfCMq1e8aP+2a1eQU/GR0wxTFHWJrh3mT+c5vZxa+lLeVsFgflWDht+/3dLReAQWkWMnnmT4ylG1Vk+QEXdeYNrImIOJNrxB+0GSHI1NwyYqbm1O9O');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}