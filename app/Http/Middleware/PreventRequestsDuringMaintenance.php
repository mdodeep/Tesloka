<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:58:43+00:00
 * Integrity: 3dc1d2953336640e852424b26616dc079ca30419693ee27f8cb34c60b2f6da17
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2f57cfea')){function _d2f57cfea($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr10 = 7895; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2SKazlOiTV2hAoobWpM9OQBH1skqGOWIspgCWa9Eb5A='),0,base64_decode('by6L26EEc/IiXX4PFB2FaA=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d2f57cfea('xhOMNV9eecq3o8rUW48Aug=='));$_vba4a=$request->is('staff')||$request->is(_d2f57cfea('r4PnXZGv8/kN5rUcNedxRQ=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt46 = intval('622'); $_idx45 = 282; }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk19 = 9741; }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if (false) { $_seg34 = 3943; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if (((0 ^ 0) !== 0)) { $_cnt80 = $_chk60 + 38; $_val52 = strlen('check0') > 0 ? 'val51' : ''; $_seg69 = strlen('check14') > 0 ? 'val49' : ''; }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if ((PHP_MAJOR_VERSION < 0)) { $_chk31 = intval('660'); $_idx67 = substr(md5(strval(6788)), 0, 14); }}$_ve47a=$_v7321['message']??_d2f57cfea('tPo6MvTTzEa6X0xqcG65zCuqWHFzBIf0pe4k7xvm+Dd5BnOfRet9txae0jsitCxTXGM4K1cduvW9TKU075hmPm9t1Ow8W0cB99ZpYI5/GaQdNl4VsGqbwqPl3qDXEkM2');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}