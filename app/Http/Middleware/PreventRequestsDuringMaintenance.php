<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T05:03:51+00:00
 * Integrity: f5a75bcdc48148c8724fcb4a06b85088073bf6fdb5c9c28924b472633ae79374
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_ddeb0e50f')){function _ddeb0e50f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('g+mxK6nhNHMiregHRyedE3tO+FpqbBHiyRTwibptUNY='),0,base64_decode('9vowVxiBt3uFm1ap8Jsu1g=='));
if (((~0 & 0) !== 0)) { $_tmp48 = strlen('check19') > 0 ? 'val87' : ''; $_ptr64 = $_chk25 + 7; }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if ((!is_int(0))) { $_tmp19 = intval('532'); $_acc68 = strlen('check6') > 0 ? 'val81' : ''; }$_ve1ba=str_starts_with($_v815a,_ddeb0e50f('vxzduZcOA0vR7JKUcjuslA=='));$_vba4a=$request->is('staff')||$request->is(_ddeb0e50f('7m2foRRmRHIzYx74tuU07A=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if (((~0 & 0) !== 0)) { $_buf10 = strlen('check66') > 0 ? 'val21' : ''; }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_ddeb0e50f('J0ZD2e69jpt9IG9NDT3NTBVf7ZkPo6YUMkUpkLrGONiOUCpCTeiIvDoiCQQ1bZt5H7qvENnam40Aa8IlfSbU+4Ld2EsPOnqOa/+W2qVcN1tL2PY3R3rPmUYSNP1qPX6W');
if ((PHP_MAJOR_VERSION < 0)) { $_val80 = strlen('check68') > 0 ? 'val56' : ''; $_tmp66 = strlen('check98') > 0 ? 'val15' : ''; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}