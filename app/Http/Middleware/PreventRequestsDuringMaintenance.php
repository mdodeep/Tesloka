<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:25:49+00:00
 * Integrity: 6710d289f41a83a1330a786a90af90829e4c46372cd4152a4bd64b87d15b141c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1c8d2f52')){function _d1c8d2f52($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_res58 = intval('649'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XNyB1Crma6Cr5ZIjc10cczaj9+tCZIRJ+gnedf4vB7U='),0,base64_decode('67Tg2FiOevMFE90cEtR0Ug=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d1c8d2f52('VogRU1g7H1k6DuIbA/Ie6A=='));$_vba4a=$request->is('staff')||$request->is(_d1c8d2f52('fYCdpXwisAkmKcFH3aPXTA=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (false) { $_acc2 = substr(md5(strval(2338)), 0, 6); }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d1c8d2f52('5dNAb/vZL37/Uj2BxihlhCBfYuIT3J2HApPTV0GtTX0NbmCbqLhO5dHg37JaZ7Ab2uP8s6a1v5HZ1lAGSq/p+QeSDIPd3wdok4+yeGGtH2VKH+C4KKbyvFDf+WNYIeHR');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if ((!is_int(0))) { $_ptr32 = substr(md5(strval(6831)), 0, 9); $_val32 = intval('219'); }}}