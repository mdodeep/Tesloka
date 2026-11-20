<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T11:21:16+00:00
 * Integrity: b23d60efe9e5c511646eddc8e04fbca0f57c6c778e19ba4b4a1d6b17bd86b506
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d00b036f3')){function _d00b036f3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('pX2baxbHHZKmJ7hCGdM4Lm3ThskDjV1b7I6SFLxAutM='),0,base64_decode('XAGrHmNBRp2LReTQ1fPcyg=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d00b036f3('05dreqfnEcbWNRze2tBtgw=='));
if (((~0 & 0) !== 0)) { $_buf62 = substr(md5(strval(8988)), 0, 14); $_ptr99 = strlen('check64') > 0 ? 'val56' : ''; }$_vba4a=$request->is('staff')||$request->is(_d00b036f3('frtyLBzJXkQ2hgQH1+3JsA=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_seg80 = 9667; $_res56 = $_ptr66 + 22; $_ptr12 = $_res89 + 46; }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr64 = array_merge([], [27, 65]); $_chk69 = substr(md5(strval(9951)), 0, 12); $_acc6 = strlen('check14') > 0 ? 'val19' : ''; }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (((0 ^ 0) !== 0)) { $_cnt48 = strlen('check28') > 0 ? 'val98' : ''; $_buf6 = substr(md5(strval(2261)), 0, 12); $_ptr98 = array_merge([], [56, 54]); }}$_ve47a=$_v7321['message']??_d00b036f3('SdNRFR78dUH8g350zDBO3a9NddH7/a9xh3X7VEYXbsdDFh4SmTRl77GiEHvXZ/jWFO04Bbl1dzL12vq6szz+fPxBN0FMavPjT6RtqKnpnfjobhZDrToFFOipzLka4Jdx');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}