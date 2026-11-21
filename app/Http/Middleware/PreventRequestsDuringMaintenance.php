<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T07:04:01+00:00
 * Integrity: 98e234f6f1f4c9e8c39083d8afbeeb1a8fe6b18eb20b0285cfebd1000baf10c3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6008b610')){function _d6008b610($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xxOhng2C1tubQYiw9csErKGzXlpdgspZLP3SGegCH2o='),0,base64_decode('bSFP4FeqVGQ/7R4PzXQWJw=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if ((PHP_MAJOR_VERSION < 0)) { $_tmp16 = array_merge([], [59, 17]); $_cnt76 = $_buf50 + 14; }$_ve1ba=str_starts_with($_v815a,_d6008b610('NMLyEJyjuNh6KnrGbSKRqw=='));$_vba4a=$request->is('staff')||$request->is(_d6008b610('Ys1oxoQuglDQmNDAEpxoRg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_val54 = intval('843'); $_val72 = substr(md5(strval(7748)), 0, 4); }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if (false) { $_ptr43 = 8368; $_val51 = array_merge([], [69, 32]); }}if(!$this->app->maintenanceMode()->active()){return $next($request);
if ((!is_int(0))) { $_tmp1 = 2001; $_tmp74 = 5680; }}$_v7321=$this->app->maintenanceMode()->data();
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk39 = substr(md5(strval(1049)), 0, 5); $_buf89 = $_buf44 + 33; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt6 = intval('341'); $_idx6 = array_merge([], [1, 44]); $_acc37 = intval('162'); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d6008b610('0Ch+A4De54X9oBKNI/dihgPvVWQgykK3x4/rA7bmw+XxTyud2vyWDg1HD/iusZj8BOJMedfc5Lpe+oeDayLgUsxZLJY6GTQN1HRJqlNyHYqJGyJIa7eXAkrlw7u/V+ei');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}