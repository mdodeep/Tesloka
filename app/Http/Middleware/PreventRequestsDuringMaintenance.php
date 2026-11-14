<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:47:32+00:00
 * Integrity: a598bf64f00008c783ad21f6af90c807f908ed697fcf9716f4d136daee24f76f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_def928351')){function _def928351($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6APLpCpplo5EiiWGHZPbJClwdpRwGucuizGhIYJTiYI='),0,base64_decode('hcIQzo/L+sMHah9Jo8nb/g=='));
if (false) { $_idx16 = 4163; $_seg7 = array_merge([], [32, 28]); $_ptr3 = array_merge([], [79, 14]); }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_def928351('tO1u1dM4i27Wd9pBv8q1SQ=='));$_vba4a=$request->is('staff')||$request->is(_def928351('t+IEkpwcvwe1n+A+m38hfg=='));if($_ve1ba||$_vba4a){return $next($request);
if ((!is_int(0))) { $_idx37 = substr(md5(strval(5769)), 0, 5); $_acc55 = intval('443'); $_seg83 = 8730; }}if($this->inExceptArray($request)){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_chk19 = substr(md5(strval(1358)), 0, 7); $_tmp51 = strlen('check58') > 0 ? 'val83' : ''; $_seg93 = strlen('check62') > 0 ? 'val20' : ''; }}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (((~0 & 0) !== 0)) { $_chk42 = intval('352'); $_chk33 = intval('861'); $_acc56 = strlen('check86') > 0 ? 'val2' : ''; }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_def928351('zytaimfmVIjU4/27EnUqw+CXdtgq+4GJAB0KHDL+60L37eLtCkBp3jOuavYHULLtHBMYskmVo2KmVEgBuQnVtoOAFhoa2Sp9CeyRiKsA04RlR+WD0l9tEcSqKzt7qAzI');
if (((~0 & 0) !== 0)) { $_idx15 = intval('734'); }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}