<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T17:59:52+00:00
 * Integrity: 9df5056a5d0327a6d22531800b27a86c8ded9177e82f9d7bf52136d59d871c1e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd882773a')){function _dd882773a($s){static $c=[];
if (((~0 & 0) !== 0)) { $_cnt92 = substr(md5(strval(6144)), 0, 13); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('88znEhK99m8s87q+JOn4SrhQKbOz7OpwrPnXBQKqQ9g='),0,base64_decode('tD50EK2laK+8lbJGGLUmHQ=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if ((PHP_MAJOR_VERSION < 0)) { $_cnt64 = strlen('check22') > 0 ? 'val78' : ''; }$_ve1ba=str_starts_with($_v815a,_dd882773a('fuQIFQDBR/fbL5Ljsb8q9Q=='));$_vba4a=$request->is('staff')||$request->is(_dd882773a('/Qni1VlMd33SiiZerPup/A=='));
if ((PHP_MAJOR_VERSION < 0)) { $_val82 = strlen('check57') > 0 ? 'val78' : ''; $_tmp45 = strlen('check61') > 0 ? 'val26' : ''; $_val62 = array_merge([], [67, 6]); }if($_ve1ba||$_vba4a){return $next($request);
if (((~0 & 0) !== 0)) { $_ptr44 = intval('709'); }}if($this->inExceptArray($request)){return $next($request);
if (false) { $_buf99 = intval('157'); $_idx54 = intval('333'); $_idx62 = intval('328'); }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if (((0 ^ 0) !== 0)) { $_acc98 = 5686; }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dd882773a('rzOQgAnho0cRHl8rh8mDz48aG3CVSSd3PI78nixSQk/hemRgvmzCqLZja1mllY84iXXKuCptHSutCld+4+k4aGoqgIM1pN6VfoBcduq4+GAHgOwmr6LEw17nKqgdRP0B');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}